<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LogisticFinishGood Controller
 *
 * @property \App\Model\Table\LogisticFinishGoodTable $LogisticFinishGood
 */
class LogisticFinishGoodController extends AppController
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
        $productMasterlist = $this->ProductMasterlist->find('all');
        $part_no = $part_name = null;
        foreach($productMasterlist as $pm){
            $part_no .= '{label:"'.$pm->part_no.'",idx:"'.$pm->part_name.'"},';
            $part_name .= '{label:"'.$pm->part_name.'",idx:"'.$pm->part_no.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');

        $dbInfo = $this->LogisticFinishGood->find()->count();
        $logisticFinishGood = $this->LogisticFinishGood->newEntity();
        if ($this->request->is('post')) {
            $logisticFinishGood = $this->LogisticFinishGood->patchEntity($logisticFinishGood, $this->request->data);
            if ($this->LogisticFinishGood->save($logisticFinishGood)) {
                $this->Flash->success(__('The Transport requisition has been saved.'));

                return $this->redirect(['action' => 'report']);
            }
            $this->Flash->error(__('The Transport requisition could not be saved. Please, try again.'));
        }
        $this->set(compact('logisticFinishGood'));
        $this->set('_serialize', ['logisticFinishGood']);
        $this->set('trf_no', $dbInfo+1);
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        //$this->render('report');
        $logisticFinishGood = $this->paginate($this->LogisticFinishGood->find('all',['order'=>['LogisticFinishGood.id'=>'desc']]));

        $this->set(compact('logisticFinishGood'));
        $this->set('_serialize', ['logisticFinishGood']);
    }

    public function view($id){
        $logisticFinishGood = $this->LogisticFinishGood->get($id, [
            'contain' => []
        ]);

        $this->set('logisticFinishGood', $logisticFinishGood);
        $this->set('_serialize', ['logisticFinishGood']);
    }

    public function requested(){
        $lfg = $this->LogisticFinishGood->find('all')
            ->where(['stat' => 'pending']);
        $this->set(compact('lfg'));
        $this->set('_serialize', ['lfg']);
    }

    public function approve($id = null){
        $lfg = $this->LogisticFinishGood->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lfg = $this->LogisticFinishGood->patchEntity($lfg, $this->request->data);
            if ($this->LogisticFinishGood->save($lfg)) {
                $this->Flash->success(__('The pending request has been processed.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be processed. Please, try again.'));
        }
        $this->set(compact('lfg'));
        $this->set('_serialize', ['lfg']);
        $this->set('pic', $this->Auth->user('username'));
    }
    
    public function searchApi(){
        $this->autoRender = false;
        $finalResult = new \stdClass();
        if($this->request->is('post')){
            if($this->request->data('do-no') != null){
                $searchData = $this->LogisticFinishGood->find()
                    ->where(['del_order_no' => $this->request->data('do-no')]);
                foreach($searchData as $sd){
                    if($sd->id != null){
                        $finalResult->logistics[] = $sd;
                    }
                }
            }else{
                $po_nos = $po_no = null;
                for ($i = 0; $i < count($this->request->data()); $i++) {
                    $po_nos[] = $this->request->data('po-no' . $i);
                }
                foreach ($po_nos as $r) {
                    if ($r != null) {
                        $po_no[] = $r;
                    }
                }
                foreach($po_no as $pn){
                    $matches[] = $this->LogisticFinishGood->find('all')
                        ->where(['po_no' => $pn]);
                }
                foreach ($matches as $ms) {
                    foreach ($ms as $m) {
                        if ($m->id != null) {
                            $finalResult->logistics[] = $m;
                        }
                    }
                }
            }

            print_r(json_encode($finalResult, JSON_PRETTY_PRINT));
            die();
        }
    }

}
