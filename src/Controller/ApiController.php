<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Api Controller
 *
 * @property \App\Model\Table\ApiTable $Api
 *
 * @method \App\Model\Entity\Api[] paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{

    public function pm(){
        if ($this->request->is('post')) {
        $this->autoRender = false;
        $this->loadModel('ProductMasterlist');
        $result = new \stdClass();
        $pml = $this->ProductMasterlist->find('all')
        ->where(['part_name' => $this->request->data('part_name')])
                ->where(['part_no' => $this->request->data('part_no')]);
                foreach($pml as $p){
                    $result->min_stock = $p->min_stock;
                }
        echo json_encode($result, JSON_PRETTY_PRINT);
        die();
        }
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
        echo json_encode($pm,JSON_PRETTY_PRINT);
        die();
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
    echo json_encode($pm, JSON_PRETTY_PRINT);
    die();
    }
    
    public function storeReport(){
        $this->loadModel('ProductMasterlist');
        $inventory = $this->paginate($this->ProductMasterlist->find('all',['order'=>['ProductMasterlist.created' => 'desc']]));
        
        echo json_encode($inventory, JSON_PRETTY_PRINT);
        die();
    }
    
    public function forProd(){
        $this->loadModel('StockOut');
        $sto = $this->StockOut->find('all');
        
        echo json_encode($sto, JSON_PRETTY_PRINT);
        die();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['pm','stockOutRecord','stockInRecord','storeReport','forProd']);
    }

}
