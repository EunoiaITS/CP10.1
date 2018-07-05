<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * GatePass Controller
 *
 * @property \App\Model\Table\GatePassTable $GatePass
 */
class GatePassController extends AppController
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
        $this->loadModel('LogisticFinishGood');
        $lfg = $this->paginate($this->LogisticFinishGood);
        $do_no = null;
        foreach($lfg as $data){
            $do_no .= '"'.$data->del_order_no.'",';
        }
        $do_no = rtrim($do_no, ',');

        $this->set('do_no', $do_no);
        $gp_no = $this->GatePass->find('all', ['fields' => 'id'])->last();
        $this->set('gp_no', $gp_no->id+1);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('LogisticFinishGood');
        $gpData = $this->paginate($this->GatePass->find('all',['order'=>['GatePass.id'=>'desc']]));
        $finalData = array();
        $eachData = array();

        foreach($gpData as $data){
            $eachData = $this->LogisticFinishGood->find('all')
                ->where(['del_order_no' => $data->do_no]);
            foreach($eachData as $shama){
                $data->part_name = $shama->part_name;
                $data->quantity = $shama->quantity;
            }
            $finalData[] = $eachData;
        }

        $this->set(compact('gpData'));
        $this->set('_serialize', ['gpData']);
    }

    public function addItems(){
        $this->autoRender = false;
        $gpTable = TableRegistry::get('GatePass');
        $gpData = array();
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $total = $this->request->data['total'];
                for($i = 1; $i <= $total; $i++){
                    $gpData[$i]['stat'] = 'pending';
                    $gpData[$i]['prepared_by'] = $this->Auth->user('username');
                    $gpData[$i]['date'] = $this->request->data('date'.$i);
                    $gpData[$i]['do_no'] = $this->request->data('do_no'.$i);
                    $gpData[$i]['remarks_prep'] = $this->request->data('remarks_prep'.$i);
                }
                $gps = $gpTable->newEntities($gpData);
                foreach($gps as $gp){
                    $gpTable->save($gp);
                }
                $this->redirect(['action' => 'report']);
            }
        }
    }

    public function requested(){
        $this->loadModel('LogisticFinishGood');
        $gp = $this->GatePass->find('all')
            ->where(['stat' => 'pending']);
        foreach($gp as $data){
            $eachData = $this->LogisticFinishGood->find('all')
                ->where(['del_order_no' => $data->do_no]);
            foreach($eachData as $shama){
                $shama->id = $data->id;
                $shama->remarks = $data->remarks;
                $shama->date = $data->date;
                $shama->prepared_by = $data->prepared_by;
                $shama->stat = $data->stat;
                $shama->approved_by = $data->approved_by;
            }
        }
        $this->set(compact('gp'));
        $this->set('_serialize', ['gp']);
    }

    public function approve($id = null){
        $gp = $this->GatePass->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gp = $this->GatePass->patchEntity($gp, $this->request->data);
            if ($this->GatePass->save($gp)) {
                $this->Flash->success(__('The pending request has been processed.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be processed. Please, try again.'));
        }
        $this->set(compact('gp'));
        $this->set('_serialize', ['gp']);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function search(){
        $this->autoRender = false;
        $this->viewBuilder()->layout('ajax');
        $this->loadModel('LogisticFinishGood');
        if($this->request->is('ajax')){
            $search = $this->LogisticFinishGood->find('all')
                ->where(['del_order_no' => $this->request->data('del_order_no')]);
            if($search->count() < 1){
                echo json_encode(array('message' => 'No data found!'));
            }
            foreach($search as $data){
                echo json_encode($data);
            }
        }
    }

    public function view($id){
        $this->loadModel('LogisticFinishGood');
        $gpData = $this->GatePass->find('all')
            ->where(['id' => $id]);
        $eachData = array();

        foreach($gpData as $data){
            $eachData = $this->LogisticFinishGood->find('all')
                ->where(['del_order_no' => $data->do_no]);
            foreach($eachData as $shama){
                $data->part_name = $shama->part_name;
                $data->quantity = $shama->quantity;
            }
        }

        $this->set('finalData', $gpData);
    }

}
