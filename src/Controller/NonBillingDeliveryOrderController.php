<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * NonBillingDeliveryOrder Controller
 *
 * @property \App\Model\Table\NonBillingDeliveryOrderTable $NonBillingDeliveryOrder
 */
class NonBillingDeliveryOrderController extends AppController
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
        $po_no = null;
        $urlToEng = 'http://salesmodule.acumenits.com/purchase-order/all-po';


        $optionsForEng = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForEng  = stream_context_create($optionsForEng);
        $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
        if ($resultFromEng === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromEng = json_decode($resultFromEng);
        foreach($dataFromEng as $ss){
            $po_no .= '"'.$ss->po_no.'",';
        }
        $po_no = rtrim($po_no, ',');
        $this->loadModel('NbdoReport');
        $this->loadModel('ProductMasterlist');
        $productMasterlist = $this->paginate($this->ProductMasterlist);
        $part_no = $part_name = null;
        foreach($productMasterlist as $pm){
            $part_no .= '{label:"'.$pm->part_no.'",idx:"'.$pm->part_name.'"},';
            $part_name .= '{label:"'.$pm->part_name.'",idx:"'.$pm->part_no.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');

        $do_no = $this->NbdoReport->find()->count();
        $this->set('do_no', $do_no+1);
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('pic', $this->Auth->user('username'));
        $this->set('po_no', $po_no);
    }

    public function report(){
        $this->loadModel('NbdoReport');
        $nbdoReport = $this->paginate($this->NbdoReport->find('all',['order'=>['NbdoReport.id'=>'desc']]));
        $this->set(compact('nbdoReport'));
        $this->set('_serialize', ['nbdoReport']);
    }

    public function addItems(){
        $this->autoRender = false;
        $this->viewBuilder()->layout('ajax');
        $nbdoTable = TableRegistry::get('NbdoReport');
        $nbdo = $nbdoTable->newEntity();
        if($this->request->is('ajax')){
            $nbdo->part_no = $this->request->data['part_no'];
            $nbdo->part_name = $this->request->data['part_name'];
            $nbdo->do_no = $this->request->data['do_no'];
            $nbdo->po_no = $this->request->data['po_no'];
            $nbdo->mr_no = $this->request->data['mr_no'];
            $nbdo->qty = $this->request->data['qty'];
            $nbdo->del_to = $this->request->data['del_to'];
            $nbdo->date = $this->request->data['date'];
            $nbdo->stat = $this->request->data['stat'];
            $nbdo->prepared_by = $this->request->data['prepared_by'];
            $nbdo->remarks = $this->request->data['remarks'];
            if($nbdoTable->save($nbdo)){
                echo 'Record added!';
            }else{
                echo 'Error while adding record!';
            }
        }
    }

    public function requested(){
        $this->loadModel('NbdoReport');
        $nbdo = $this->NbdoReport->find('all')
            ->where(['stat' => 'pending']);
        $this->set(compact('nbdo'));
        $this->set('_serialize', ['nbdo']);
    }

    public function approve($id = null){
        $this->loadModel('NbdoReport');
        $nbdo = $this->NbdoReport->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nbdo = $this->NbdoReport->patchEntity($nbdo, $this->request->data);
            if ($this->NbdoReport->save($nbdo)) {
                $this->Flash->success(__('The pending request has been processed.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be processed. Please, try again.'));
        }
        $this->set(compact('nbdo'));
        $this->set('_serialize', ['nbdo']);
        $this->set('pic', $this->Auth->user('username'));
    }
    
    public function view($id = null){
        $this->loadModel('NbdoReport');
        $nbdo = $this->NbdoReport->get($id, [
            'contain' => []
        ]);
        $this->set(compact('nbdo'));
        $this->set('_serialize', ['nbdo']);
        $this->set('pic', $this->Auth->user('username'));
    }

}
