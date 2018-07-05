<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * StoreCreditNote Controller
 *
 * @property \App\Model\Table\StoreCreditNoteTable $StoreCreditNote
 */
class StoreCreditNoteController extends AppController
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
//        $this->loadModel('ScnReport');
//        $ScnReport = $this->ScnReport->newEntity();
//        if ($this->request->is('post')) {
//            $ScnReport = $this->ScnReport->patchEntity($ScnReport, $this->request->data);
//            if ($this->ScnReport->save($ScnReport)) {
//                $this->Flash->success(__('The store credit note has been saved.'));
//
//                return $this->redirect(['action' => 'report']);
//            }
//            if($ScnReport->errors()){
//                $error_msg = [];
//                foreach( $ScnReport->errors() as $errors){
//                    if(is_array($errors)){
//                        foreach($errors as $error){
//                            $error_msg[]    =   $error;
//                        }
//                    }else{
//                        $error_msg[]    =   $errors;
//                    }
//                }
//
//                if(!empty($error_msg)){
//                    $this->Flash->error(
//                        __("Data could not be saved. Please fix the following error(s):".implode("\n \r", $error_msg))
//                    );
//                }
//            }
//        }
//        $this->set(compact('ScnReport'));
//        $this->set('_serialize', ['ScnReport']);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function report(){
        $this->loadModel('ScnReport');
        $scnData = $this->paginate($this->ScnReport->find('all',['order'=>['ScnReport.id'=>'desc']]));
        $this->set(compact('scnData'));
        $this->set('_serialize', ['scnData']);
    }

    public function requested(){
        $this->loadModel('ScnReport');
        $scn = $this->ScnReport->find('all')
            ->where(['stat' => 'pending']);
        $this->set(compact('scn'));
        $this->set('_serialize', ['scn']);
    }

    public function approve($id = null){
        $this->loadModel('ScnReport');
        $scn = $this->ScnReport->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scn = $this->ScnReport->patchEntity($scn, $this->request->data);
            if ($this->ScnReport->save($scn)) {
                $this->Flash->success(__('The pending request has been processed.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be processed. Please, try again.'));
        }
        $this->set(compact('scn'));
        $this->set('_serialize', ['scn']);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function view($id = null)
    {
        $this->loadModel('ScnReport');
        $scn = $this->ScnReport->get($id, [
            'contain' => []
        ]);

        $this->set('scn', $scn);
        $this->set('_serialize', ['scn']);
    }

    public function addItems(){
        $this->autoRender = false;
        $ScnReport = TableRegistry::get('ScnReport');
        $ScnData = array();
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $total = $this->request->data['total'];
                for($i = 1; $i <= $total; $i++){
                    $ScnData[$i]['date'] = $this->request->data('date');
                    $ScnData[$i]['ref_no'] = $this->request->data('ref_no');
                    $ScnData[$i]['section'] = $this->request->data('section');
                    $ScnData[$i]['pic'] = $this->request->data('pic');
                    $ScnData[$i]['stat'] = $this->request->data('stat');
                    $ScnData[$i]['item_desc'] = $this->request->data('item_desc'.$i);
                    $ScnData[$i]['qty'] = $this->request->data('qty'.$i);
                    $ScnData[$i]['reason_code'] = $this->request->data('reason_code'.$i);
                    $ScnData[$i]['remarks'] = $this->request->data('remarks'.$i);
                }
                $scns = $ScnReport->newEntities($ScnData);
                foreach($scns as $scn){
                    $ScnReport->save($scn);
                }
                $this->redirect(['action' => 'report']);
            }
        }
    }

}
