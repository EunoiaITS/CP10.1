<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * GTR Controller
 *
 * @property \App\Model\Table\GTRTable $GTR
 */
class GTRController extends AppController
{

    public $paginate = [
        // Other keys here.
        'maxLimit' => 50
    ];

    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->layout('frontend');
    }

    public function dashboard(){

    }

    public function add(){
        $this->loadModel('Gtr');
        $gtr_no = $this->Gtr->find('all', ['fields' => 'id'])->last();
        $this->set('pic', $this->Auth->user('username'));
        $this->set('gtr_no', $gtr_no->id+1);
    }

    public function report(){
        $this->loadModel('Gtr');
        $gtrData = $this->paginate($this->Gtr->find('all',['order'=>['Gtr.id'=>'desc']]));
        $this->set(compact('gtrData'));
        $this->set('_serialize', ['gtrData']);
    }

    public function addItems(){
        $gtrTable = TableRegistry::get('Gtr');
        $gtr = $gtrTable->newEntity();
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                foreach($this->request->data as $key => $value){
                    $gtr->$key = $value;
                }
                if($gtrTable->save($gtr)){
                    $this->redirect(['action' => 'report']);
                }
            }
        }
    }

    public function requested(){
        $this->loadModel('Gtr');
        $gtr = $this->Gtr->find('all')
            ->where(['stat' => 'pending']);
        $this->set(compact('gtr'));
        $this->set('_serialize', ['gtr']);
    }

    public function approve($id = null){
        $this->loadModel('Gtr');
        $gtr = $this->Gtr->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gtr = $this->Gtr->patchEntity($gtr, $this->request->data);
            if ($this->Gtr->save($gtr)) {
                $this->Flash->success(__('The pending request has been approved.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be approved. Please, try again.'));
        }
        $this->set(compact('gtr'));
        $this->set('_serialize', ['gtr']);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function view($id = null){
        $this->loadModel('Gtr');
        $gtr = $this->Gtr->get($id, [
            'contain' => []
        ]);
        $this->set(compact('gtr'));
        $this->set('_serialize', ['gtr']);
        $this->set('pic', $this->Auth->user('username'));
    }

}
