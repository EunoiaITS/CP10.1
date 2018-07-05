<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * MaterialRequisition Controller
 *
 * @property \App\Model\Table\MaterialRequisitionTable $MaterialRequisition
 */
class MaterialRequisitionController extends AppController
{

    public $paginate = [
        // Other keys here.
        'maxLimit' => 50
    ];

    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->layout('frontend');
    }

    public function add(){
        $this->loadModel('MrReport');
        $mr_no = $this->MrReport->find()->count();
        $this->set('mr_no', $mr_no+1);
        $this->set('pic', $this->Auth->user('username'));
        $this->loadModel('ProductMasterlist');
        $productMasterlist = $this->paginate($this->ProductMasterlist);
        $part_no = $part_name = null;
        foreach($productMasterlist as $pm){
            $part_no .= '{label:"'.$pm->part_no.'",idx:"'.$pm->part_name.'"},';
            $part_name .= '{label:"'.$pm->part_name.'",idx:"'.$pm->part_no.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');

        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);

        $this->loadModel('MrReport');

        $mr = $this->MrReport->newEntity();
        if ($this->request->is('post')) {
            $mr = $this->MrReport->patchEntity($mr, $this->request->data);
            if ($this->MrReport->save($mr)) {
                $this->Flash->success(__('The material requisition has been saved.'));

                return $this->redirect(['action' => 'report']);
            }
            if($mr->errors()){
                $error_msg = [];
                foreach( $mr->errors() as $errors){
                    if(is_array($errors)){
                        foreach($errors as $error){
                            $error_msg[]    =   $error;
                        }
                    }else{
                        $error_msg[]    =   $errors;
                    }
                }

                if(!empty($error_msg)){
                    $this->Flash->error(
                        __("Data could not be saved. Please fix the following error(s):".implode("\n \r", $error_msg))
                    );
                }
            }
        }
        $this->set(compact('mr'));
        $this->set('_serialize', ['mr']);
    }

    public function report(){
        $this->loadModel('MrReport');
        $dbData = $this->paginate($this->MrReport->find('all',['order'=>['MrReport.id'=>'desc']]));
        $this->set(compact('dbData'));
        $this->set('_serialize', ['dbData']);
    }

    public function productionReport(){
        $this->loadModel('ProdMrReport');
        $dataFromProd = null;
        $urlToProd = 'http://productionmodule.acumenits.com/api/mrReport';

        $optionsForProd = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForProd  = stream_context_create($optionsForProd);
        $resultFromProd = file_get_contents($urlToProd, false, $contextForProd);
        if ($resultFromProd !== FALSE) {
            $dataFromProd = json_decode($resultFromProd);
            foreach($dataFromProd as $dp){
                foreach($dp->items as $item){
                    $storeCheck = $this->ProdMrReport->find()
                        ->where(['prod_mr_id' => $item->id]);
                    if(!$storeCheck->isEmpty()){
                        foreach($storeCheck as $ss){
                            $item->inStore = $ss;
                        }
                    }
                }
            }
        }
        if($this->request->is('post')){
            if($this->request->data('action') == 'add'){
                $materialRequisition = $this->ProdMrReport->newEntity();
                $materialRequisition = $this->ProdMrReport->patchEntity($materialRequisition, $this->request->data);
                if ($this->ProdMrReport->save($materialRequisition)) {
                    $this->Flash->success(__('The material requisition has been saved.'));

                    return $this->redirect(['action' => 'productionReport']);
                }
                $this->Flash->error(__('The material requisition could not be saved. Please, try again.'));
            }
            if($this->request->data('action') == 'edit'){
                $materialRequisition = $this->ProdMrReport->get($this->request->data('store-id'), [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $materialRequisition = $this->ProdMrReport->patchEntity($materialRequisition, $this->request->data);
                    if ($this->ProdMrReport->save($materialRequisition)) {
                        $this->Flash->success(__('The material requisition has been saved.'));

                        return $this->redirect(['action' => 'productionReport']);
                    }
                    $this->Flash->error(__('The material requisition could not be saved. Please, try again.'));
                }
            }
        }
        $this->set('mr', $dataFromProd);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function view($id){
        $this->loadModel('MrReport');
        $materialRequisition = $this->MrReport->get($id, [
            'contain' => []
        ]);

        $this->set('materialRequisition', $materialRequisition);
        $this->set('_serialize', ['materialRequisition']);
    }

    public function requested(){
        $this->loadModel('MrReport');
        $mr = $this->MrReport->find('all')
            ->where(['stat' => 'pending']);
        $this->set(compact('mr'));
        $this->set('_serialize', ['mr']);
    }

    public function approve($id = null){
        $this->loadModel('MrReport');
        $mr = $this->MrReport->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mr = $this->MrReport->patchEntity($mr, $this->request->data);
            if ($this->MrReport->save($mr)) {
                $this->Flash->success(__('The pending request has been processed.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be processed. Please, try again.'));
        }
        $this->set(compact('mr'));
        $this->set('_serialize', ['mr']);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function addItems(){
        $this->autoRender = false;
        $MrReport = TableRegistry::get('MrReport');
        $MrData = array();
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $total = $this->request->data['total'];
                for($i = 1; $i <= $total; $i++){
                    $MrData[$i]['date_issue'] = $this->request->data('date_issue'.$i);
                    $MrData[$i]['mr_no'] = $this->request->data('mr_no'.$i);
                    $MrData[$i]['ccar_no'] = $this->request->data('ccar_no'.$i);
                    $MrData[$i]['job'] = $this->request->data('job'.$i);
                    $MrData[$i]['sect'] = $this->request->data('sect'.$i);
                    $MrData[$i]['dept'] = $this->request->data('dept'.$i);
                    $MrData[$i]['stat'] = $this->request->data('stat'.$i);
                    $MrData[$i]['prepared_by'] = $this->request->data('prepared_by'.$i);
                    $MrData[$i]['part_no'] = $this->request->data('part_no'.$i);
                    $MrData[$i]['part_name'] = $this->request->data('part_name'.$i);
                    $MrData[$i]['qty_req'] = $this->request->data('qty_req'.$i);
                    $MrData[$i]['qty_issued'] = $this->request->data('qty_issued'.$i);
                    $MrData[$i]['remarks'] = $this->request->data('remarks'.$i);
                }
                $mrs = $MrReport->newEntities($MrData);
                foreach($mrs as $mr){
                    $MrReport->save($mr);
                }
                $this->redirect(['action' => 'report']);
            }
        }
    }

}
