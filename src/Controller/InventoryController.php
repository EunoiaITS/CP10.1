<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventory Controller
 *
 * @property \App\Model\Table\InventoryTable $Inventory
 */
class InventoryController extends AppController
{

    public $paginate = [
        // Other keys here.
        'maxLimit' => 50
    ];

    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->layout('frontend');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->loadModel('ProductMasterlist');
        $inventory = $this->paginate($this->ProductMasterlist);

        $this->set(compact('inventory'));
        $this->set('_serialize', ['inventory']);
    }
    public function add() {
        if ($this->request->is('post')) {
            $this->loadModel('ManualStocks');

            $this->request->data['pic'] = $this->Auth->user('username');
            $manual = $this->ManualStocks->newEntity($this->request->data);
            if ($this->ManualStocks->save($manual)) {
                $this->Flash->success(__('Stock manually has been saved.'));
                return $this->redirect(['action' => 'view']);
            }
        }

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
    }

    public function view() {
        $this->loadModel('ManualStocks');

        $stocks = $this->paginate($this->ManualStocks);
        $this->set('stocks', $stocks);
    }

    public function getCurrentBalance($partNo) {
        $this->loadModel('InStockCode');
        $sum = $this->InStockCode->find('all', [
            'conditions' => [
                'part_no' => $partNo
            ]
        ])->toArray();

        $qty = 0;
        foreach ($sum as $sm) {
            $qty += (is_numeric($sm->quantity) ? $sm->quantity : 0);
        }

        echo $qty;
        exit;
    }

    //Special Use for Manual Stocks Edit

    public function edit($id = null)
    {
        $this->loadModel('ManualStocks');
        $ms = $this->ManualStocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ms = $this->ManualStocks->patchEntity($ms, $this->request->data);
            if ($this->ManualStocks->save($ms)) {
                $this->Flash->success(__('The Manual Stock has been saved.'));

                return $this->redirect(['action' => 'requested']);
            }
            $this->Flash->error(__('The Manual Stock could not be saved. Please, try again.'));
        }
    }

    public function requested(){
        $this->loadModel('ManualStocks');
        if($this->Auth->User('role') === 'verifier'){
            $st = $this->ManualStocks->find('all')
                ->where(['status' => 'requested']);
        }else{
            $st = $this->ManualStocks->find('all')
                ->where(['status' => 'verified']);
        }
        $stocks = $this->paginate($st);

        $this->set('stocks', $stocks);
    }
    public function verify($id = null){
        $this->loadModel('ManualStocks');
        $ms = $this->ManualStocks->get($id,[
            'contain' =>[]
        ]);
        $this->set('ms',$ms);
    }
    public function approve($id = null){
        $this->loadModel('ManualStocks');
        $ms = $this->ManualStocks->get($id,[
            'contain' =>[]
        ]);
        $this->set('ms',$ms);
    }

    public function invRecord(){
        $this->loadModel('ProductMasterlist');
        $this->loadModel('InStockCode');
        $this->loadModel('StockOut');
        $pm = $this->ProductMasterlist->find('all');
        foreach ($pm as $p){
            $urlToEng = 'http://engmodule.acumenits.com/api/bom-part/'.$p->bom_id;
            $optionsForEng = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'GET'
                ]
            ];
            $contextForEng  = stream_context_create($optionsForEng);
            $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
            if ($resultFromEng !== FALSE) {
                $dataFromEng = json_decode($resultFromEng);
                $p->eng = $dataFromEng;
            }
            $in = $out = '';
            $stock_in = $this->InStockCode->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_in as $s) {
                $in += $s->quantity;
                $p->in = $in;
            }
            $stock_out = $this->StockOut->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_out as $o) {
                $out += $o->quantity;
                $p->out = $out;
            }
        }
        $this->set('pm',$pm);
    }

    public function stockInRecord(){
        $this->loadModel('ProductMasterlist');
        $this->loadModel('InStockCode');
        $this->loadModel('StockOut');
        $pm = $this->ProductMasterlist->find('all');
        foreach ($pm as $p){
            $urlToEng = 'http://engmodule.acumenits.com/api/bom-part/'.$p->bom_id;
            $optionsForEng = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'GET'
                ]
            ];
            $contextForEng  = stream_context_create($optionsForEng);
            $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
            if ($resultFromEng !== FALSE) {
                $dataFromEng = json_decode($resultFromEng);
                $p->eng = $dataFromEng;
            }
            $in = $out = '';
            $stock_in = $this->InStockCode->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_in as $s) {
                $in += $s->quantity;
                $p->in = $in;
                $p->date = $s->date;
                $p->created = $s->pic_store;
            }
            $stock_out = $this->StockOut->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_out as $o) {
                $out += $o->quantity;
                $p->out = $out;
            }
        }
        $this->set('pm',$pm);
    }

    public function stockOutRecord(){
        $this->loadModel('ProductMasterlist');
        $this->loadModel('InStockCode');
        $this->loadModel('StockOut');
        $pm = $this->ProductMasterlist->find('all');
        foreach ($pm as $p){
            $urlToEng = 'http://engmodule.acumenits.com/api/bom-part/'.$p->bom_id;
            $optionsForEng = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'GET'
                ]
            ];
            $contextForEng  = stream_context_create($optionsForEng);
            $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
            if ($resultFromEng !== FALSE) {
                $dataFromEng = json_decode($resultFromEng);
                $p->eng = $dataFromEng;
            }
            $in = $out = '';
            $stock_in = $this->InStockCode->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_in as $s) {
                $in += $s->quantity;
                $p->in = $in;
            }
            $stock_out = $this->StockOut->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_out as $o) {
                $out += $o->quantity;
                $p->out = $out;
                $p->date = $o->date;
                $p->created = $o->pic_store;
                $p->tender = $o->tender_no;
                if($o->mit_no == '' && $o->prn_no == ''){
                    $p->no = $o->pr_no;
                }elseif($o->mit_no == '' && $o->mr_no == ''){
                    $p->no = $o->prn_no;
                }else{
                    $p->no = $o->mit_no;
                }
            }
        }
        $this->set('pm',$pm);
    }

    public function agingReport(){
        $this->loadModel('ProductMasterlist');
        $this->loadModel('InStockCode');
        $this->loadModel('StockOut');
        $pm = $this->ProductMasterlist->find('all');
        foreach ($pm as $p){
            $urlToEng = 'http://engmodule.acumenits.com/api/bom-part/'.$p->bom_id;
            $optionsForEng = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'GET'
                ]
            ];
            $contextForEng  = stream_context_create($optionsForEng);
            $resultFromEng = file_get_contents($urlToEng, false, $contextForEng);
            if ($resultFromEng !== FALSE) {
                $dataFromEng = json_decode($resultFromEng);
                $p->eng = $dataFromEng;
            }
            $in = $out = '';
            $stock_in = $this->InStockCode->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_in as $s) {
                $in += $s->quantity;
                $p->in = $in;
                $p->in_date = $s->date;
            }
            $stock_out = $this->StockOut->find('all')
                ->where(['pm_id'=>$p->id]);
            foreach ($stock_out as $o) {
                $out += $o->quantity;
                $p->out = $out;
                $p->out_date = $o->date;
            }
        }
        $this->set('pm',$pm);
    }
}
