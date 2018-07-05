<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * RTVN Controller
 *
 * @property \App\Model\Table\RTVNTable $RTVN
 */
class RTVNController extends AppController
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
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('RtvnReport');
        $allData = $this->paginate($this->RtvnReport->find('all',['order'=>['RtvnReport.id'=>'desc']]));
        $this->set(compact('allData'));
        $this->set('_serialize', ['allData']);
    }

    public function addItems(){
        $this->autoRender = false;
        $rtvnTable = TableRegistry::get('RtvnReport');
        $rtvnData = array();
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $total = $this->request->data['total'];
                for($i = 1; $i <= $total; $i++){
                    $rtvnData[$i]['date'] = $this->request->data('date'.$i);
                    $rtvnData[$i]['rtvn_no'] = $this->request->data('rtvn_no'.$i);
                    $rtvnData[$i]['mdr_no'] = $this->request->data('mdr_no'.$i);
                    $rtvnData[$i]['vendor'] = $this->request->data('vendor'.$i);
                    $rtvnData[$i]['part_no'] = $this->request->data('part_no'.$i);
                    $rtvnData[$i]['part_name'] = $this->request->data('part_name'.$i);
                    $rtvnData[$i]['qty'] = $this->request->data('qty'.$i);
                    $rtvnData[$i]['qty_rec'] = $this->request->data('qty_rec'.$i);
                    $rtvnData[$i]['qty_os'] = $this->request->data('qty_os'.$i);
                    $rtvnData[$i]['cn_no'] = null;
                    $rtvnData[$i]['cn'] = null;
                    $rtvnData[$i]['prepared_by'] = $this->request->data('prepared_by'.$i);;
                    $rtvnData[$i]['stat'] = $this->request->data('stat'.$i);;
                }
                $rtvns = $rtvnTable->newEntities($rtvnData);
                foreach($rtvns as $rtvn){
                    $rtvnTable->save($rtvn);
                }
                $this->redirect(['action' => 'report']);
            }
        }
    }

    public function requested(){
        $this->loadModel('RtvnReport');
        $rtvn = $this->RtvnReport->find('all')
            ->where(['stat' => 'pending']);
        $this->set(compact('rtvn'));
        $this->set('_serialize', ['rtvn']);
    }

    public function approve($id = null){
        $this->loadModel('RtvnReport');
        $rtvn = $this->RtvnReport->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rtvn = $this->RtvnReport->patchEntity($rtvn, $this->request->data);
            if ($this->RtvnReport->save($rtvn)) {
                $this->Flash->success(__('The pending request has been processed.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be processed. Please, try again.'));
        }
        $this->set(compact('rtvn'));
        $this->set('_serialize', ['rtvn']);
        $this->set('pic', $this->Auth->user('username'));
    }
    
    public function view($id = null){
        $this->loadModel('RtvnReport');
        $rtvn = $this->RtvnReport->get($id, [
            'contain' => []
        ]);
        $this->set(compact('rtvn'));
        $this->set('_serialize', ['rtvn']);
        $this->set('pic', $this->Auth->user('username'));
    }
    
    public function searchApi(){
        $this->autoRender = false;
        $query = $do_items = $part_name = null;
        $this->loadModel('RtvnReport');
        $cond = array();
        if($this->request->is('post')){
            if($this->request->data('date-from') != '' && $this->request->data('date-to') != ''){
                $cond = [
                    'conditions' => [
                        'RtvnReport.date BETWEEN "'.$this->request->data('date-from').'" AND DATE_ADD("'.$this->request->data('date-to').'", INTERVAL 30 DAY)'
                    ]
                ];
            }
            if($this->request->data('supplier') != '' || $this->request->data('rtvn_no') != '' || $this->request->data('do_no') != ''){
                $this->loadModel('LogisticFinishGood');
                $do_items = $this->LogisticFinishGood->find()
                    ->where(['del_order_no' => $this->request->data('do_no')]);
                foreach($do_items as $dos){
                    $part_name = $dos->part_name;
                }
                $query = $this->RtvnReport->find('all', $cond)
                    ->orWhere(['vendor' => $this->request->data('supplier')])
                    ->orWhere(['id' => $this->request->data('rtvn_no')])
                    ->orWhere(['part_name' => $part_name]);
            }else{
                $query = $this->RtvnReport->find('all', $cond);
            }

            print_r(json_encode($query, JSON_PRETTY_PRINT));
        }
    }

}
