<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaterialIssueTicket Controller
 *
 * @property \App\Model\Table\MaterialIssueTicketTable $MaterialIssueTicket
 */
class MaterialIssueTicketController extends AppController
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
        $this->set('prepared_by', $this->Auth->user('username'));
    }

    public function report(){
        $materialIssueTicket = $this->paginate($this->MaterialIssueTicket->find('all',['order'=>['MaterialIssueTicket.id'=>'desc']]));

        $this->set(compact('materialIssueTicket'));
        $this->set('_serialize', ['materialIssueTicket']);
    }

    public function productionReport(){
        $this->loadModel('ProdMitReport');
        $dataFromProd = null;
        $urlToProd = 'http://productionmodule.acumenits.com/api/mitReport';

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
                $storeCheck = $this->ProdMitReport->find()
                    ->where(['prod_mit_id' => $dp->id]);
                if(!$storeCheck->isEmpty()){
                    foreach($storeCheck as $ss){
                        $dp->inStore = $ss;
                    }
                }
            }
        }
        if($this->request->is('post')){
            if($this->request->data('action') == 'add'){
                $materialIssueTicket = $this->ProdMitReport->newEntity();
                $materialIssueTicket = $this->ProdMitReport->patchEntity($materialIssueTicket, $this->request->data);
                if ($this->ProdMitReport->save($materialIssueTicket)) {
                    $this->Flash->success(__('The material issue ticket has been saved.'));

                    return $this->redirect(['action' => 'productionReport']);
                }
                $this->Flash->error(__('The material issue ticket could not be saved. Please, try again.'));
            }
            if($this->request->data('action') == 'edit'){
                $materialIssueTicket = $this->ProdMitReport->get($this->request->data('store-id'), [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $materialIssueTicket = $this->ProdMitReport->patchEntity($materialIssueTicket, $this->request->data);
                    if ($this->ProdMitReport->save($materialIssueTicket)) {
                        $this->Flash->success(__('The material issue ticket has been saved.'));

                        return $this->redirect(['action' => 'productionReport']);
                    }
                    $this->Flash->error(__('The material issue ticket could not be saved. Please, try again.'));
                }
            }
        }
        $this->set('mit', $dataFromProd);
        $this->set('pic', $this->Auth->user('username'));
    }

    public function addItems(){
        $materialIssueTicket = $this->MaterialIssueTicket->newEntity();
        if ($this->request->is('post')) {
            $materialIssueTicket = $this->MaterialIssueTicket->patchEntity($materialIssueTicket, $this->request->data);
            if ($this->MaterialIssueTicket->save($materialIssueTicket)) {
                $this->Flash->success(__('The material issue ticket has been saved.'));

                return $this->redirect(['action' => 'report']);
            }
            $this->Flash->error(__('The material issue ticket could not be saved. Please, try again.'));
        }
        $this->set(compact('materialIssueTicket'));
        $this->set('_serialize', ['materialIssueTicket']);
    }

    public function view($id){
        $materialIssueTicket = $this->MaterialIssueTicket->get($id, [
            'contain' => []
        ]);

        $this->set('materialIssueTicket', $materialIssueTicket);
        $this->set('_serialize', ['materialIssueTicket']);
    }

    public function requested(){
        $mit = $this->MaterialIssueTicket->find('all')
            ->where(['stat' => 'pending']);
        $this->set(compact('mit'));
        $this->set('_serialize', ['mit']);
    }

    public function approve($id = null){
        $mit = $this->MaterialIssueTicket->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mit = $this->MaterialIssueTicket->patchEntity($mit, $this->request->data);
            if ($this->MaterialIssueTicket->save($mit)) {
                $this->Flash->success(__('The pending request has been processed.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The pending request could not be processed. Please, try again.'));
        }
        $this->set(compact('mit'));
        $this->set('_serialize', ['mit']);
        $this->set('pic', $this->Auth->user('username'));
    }

}
