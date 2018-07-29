<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * InstockCode Controller
 *
 * @property \App\Model\Table\InstockCodeTable $InstockCode
 */
class InStockCodeController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->viewBuilder()->layout('frontend');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        //$instockCode = $this->paginate($this->InstockCode);

        //$this->set(compact('instockCode'));
        //$this->set('_serialize', ['instockCode']);
    }

    public function add(){
        $this->loadModel('ProductMasterlist');
        $productMasterlist = $this->ProductMasterlist->find('all');
        $part_no = $part_name = null;
        foreach($productMasterlist as $pm){
            $part_no .= '{label:"'.$pm->part_no.'",idx:"'.$pm->part_name.'",zon:"'.$pm->zon.'",rack:"'.$pm->rack.'",bn:"'.$pm->bn.'",p_level:"'.$pm->product_level.'",uom:"'.$pm->uom.'",min_stock:"'.$pm->min_stock.'",max_stock:"'.$pm->max_stock.'",pmId:"'.$pm->id.'"},';
            $part_name .= '{label:"'.$pm->part_name.'",idx:"'.$pm->part_no.'",zon:"'.$pm->zon.'",rack:"'.$pm->rack.'",bn:"'.$pm->bn.'",p_level:"'.$pm->product_level.'",uom:"'.$pm->uom.'",min_stock:"'.$pm->min_stock.'",max_stock:"'.$pm->max_stock.'",pmId:"'.$pm->id.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');

        $this->set(compact('productMasterlist'));
        $this->set('_serialize', ['productMasterlist']);
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('pic_store', $this->Auth->user('username'));
    }

    public function stockOut(){
    	$so_no = null;

        $urlToProd = 'http://productionmodule.acumenits.com/api/mit';

        $optionsForProd = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForProd  = stream_context_create($optionsForProd);
        $resultFromProd = file_get_contents($urlToProd, false, $contextForProd);
        if ($resultFromProd === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromProd = json_decode($resultFromProd);

        $urlToProd2 = 'http://productionmodule.acumenits.com/api/prn';

        $optionsForProd2 = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            ]
        ];
        $contextForProd2  = stream_context_create($optionsForProd2);
        $resultFromProd2 = file_get_contents($urlToProd2, false, $contextForProd2);
        if ($resultFromProd2 === FALSE) {
            echo 'ERROR!!';
        }
        $dataFromProd2 = json_decode($resultFromProd2);

        $urlToEng = 'http://salesmodule.acumenits.com/sales-order/all-po';


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
            $so_no .= '"'.$ss->salesorder_no.'",';
        }
        $so_no = rtrim($so_no, ',');
        $this->loadModel('ProductMasterlist');
        $productMasterlist = $this->ProductMasterlist->find('all');
        $part_no = $part_name = null;
        foreach($productMasterlist as $pm){
            $part_no .= '{label:"'.$pm->part_no.'",idx:"'.$pm->part_name.'",pmId:"'.$pm->id.'"},';
            $part_name .= '{label:"'.$pm->part_name.'",idx:"'.$pm->part_no.'",pmId:"'.$pm->id.'"},';
        }
        $part_no = rtrim($part_no, ',');
        $part_name = rtrim($part_name, ',');

        $this->set(compact('productMasterlist'));
        $this->set('_serialize', ['productMasterlist']);
        $this->set('part_no', $part_no);
        $this->set('part_name', $part_name);
        $this->set('mit_data',$dataFromProd);
        $this->set('prn_data',$dataFromProd2);
        $this->set('pic_store', $this->Auth->user('username'));
        $this->set('so_no', $so_no);
    }

    public function addItems(){
        $this->autoRender = false;
        $this->viewBuilder()->layout('ajax');
        $inStockTable = TableRegistry::get('InStockCode');
        $inStock = $inStockTable->newEntity();
        if($this->request->is('ajax')){
            $inStock->part_no = $this->request->data['part_no'];
            $inStock->part_name = $this->request->data['part_name'];
            $inStock->quantity = $this->request->data['quantity'];
            $inStock->pic_store = $this->request->data['pic_store'];
            $inStock->date = $this->request->data['date'];
            $inStock->stock_code = $this->request->data['stock_code'];
            $inStock->pm_id = $this->request->data['pm_id'];
            if(!ctype_digit($inStock->quantity)){
                echo 'Quantity must be numeric!';
            }elseif($inStockTable->save($inStock)){
                echo 'Record added!';
            }else{
                echo 'Technical difficulty!';
            }
        }
    }

    public function addStockOut(){
        $this->loadModel('StockOut');
        if($this->request->is('post')){
            if($this->request->data['count'] != ''){
                for($i = 1; $i <= $this->request->data['count']; $i++){
                    $inStock = $this->StockOut->newEntity();
                    $inStock->part_no = $this->request->data['part_no'.$i];
                    $inStock->part_name = $this->request->data['part_name'.$i];
                    $inStock->tender_no = $this->request->data['tender_no'.$i];
                    $inStock->so_no = $this->request->data['so_no'.$i];
                        if($this->request->data['select_field'.$i] === 'PRN'){
                            $inStock->prn_no = $this->request->data['select_val'.$i];
                        }elseif ($this->request->data['select_field'.$i] === 'PR'){
                            $inStock->pr_no = $this->request->data['select_val'.$i];
                        }elseif ($this->request->data['select_field'.$i] === 'MIT'){
                            $inStock->mit_no = $this->request->data['select_val'.$i];
                        }
                    $inStock->section = $this->request->data['section'.$i];
                    $inStock->quantity = $this->request->data['quantity'.$i];
                    $inStock->pic_store = $this->request->data['pic_store'.$i];
                    $inStock->date = $this->request->data['date'.$i];
                    $inStock->pm_id = $this->request->data['pm_id'.$i];
                    if(!ctype_digit($inStock->quantity)){
                        echo 'Quantity must be numeric!';
                    }elseif($this->StockOut->save($inStock)){
                        $this->Flash->success(__('The Record has been Added ! '));
                    }else{
                        echo 'Technical difficulty!';
                    }
                }
                return $this->redirect(['action' => 'stockOut']);
            }
        }
    }
    
    public function searchApi(){
        $this->autoRender = false;
        $finalResult = new \stdClass();
        $this->loadModel('InStockCode');
        $this->loadModel('RtvnReport');
        $this->loadModel('LogisticFinishGood');
        $part_name = null;
        if($this->request->is('post')) {
            if($this->request->data('do-no') != null) {
                $do_items = $this->LogisticFinishGood->find()
                    ->where(['del_order_no' => $this->request->data('do-no')]);
                foreach($do_items as $dos) {
                    $part_name = $dos->part_name;
                    $finalResult->po_no = $dos->po_no;
                }
                $searchData = $this->InStockCode->find()
                    ->where(['part_name' => $part_name]);
                foreach($searchData as $sd) {
                    if ($sd->id != null) {
                        $finalResult->inStocks[] = $sd;
                    }
                }
                $rtvnData = $this->RtvnReport->find()
                    ->where(['part_name' => $part_name]);
                foreach($rtvnData as $rd) {
                    $finalResult->rtvns[] = $rd;
                }
            }else{
                $po_nos = $parts = $part = $po_no = null;
                for ($i = 0; $i < count($this->request->data()); $i++) {
                    $po_nos[] = $this->request->data('po-no' . $i);
                    $parts[] = $this->request->data('part' . $i);
                }
                foreach ($po_nos as $r) {
                    if ($r != null) {
                        $po_no[] = $this->request->data($r);
                    }
                }
                foreach ($parts as $p) {
                    if ($p != null) {
                        $part[] = $p;
                    }
                }
                foreach ($po_no as $d) {
                    foreach ($d as $l) {
                        $m[] = $l;
                    }
                }
                $m = array_unique($m);
                foreach ($po_nos as $pos) {
                    foreach ($m as $items) {
                        $inStocks[] = $this->InStockCode->find()
                            ->where(['part_name' => $items])
                            ->where(['tender_no' => $pos]);
                    }
                }
                foreach ($inStocks as $in) {
                    foreach ($in as $ins) {
                        if ($ins->id != null) {
                            $finalResult->inStocks[] = $ins;
                        }
                    }
                }
                foreach ($part as $j) {
                    $rtvn_s[] = $this->RtvnReport->find()
                        ->where(['part_name' => $j])
                        ->where(['vendor' => $this->request->data('supplier')]);
                }
                foreach ($rtvn_s as $rtvn) {
                    foreach ($rtvn as $s) {
                        $finalResult->rtvns[] = $s;
                    }
                }
            }

            print_r(json_encode($finalResult, JSON_PRETTY_PRINT));
            //print_r(json_encode($this->request->data(), JSON_PRETTY_PRINT));
            die();
        }
    }
    
    public function stockAvailable(){
        $this->loadModel('InStockCode');
        $this->loadModel('StockOut');
        if($this->request->is('post')){
            $this->autoRender = false;
            $inStockQty = $stockOutQty = 0;
            $inStocks = $this->InStockCode->find()
                ->where(['part_name' => $this->request->data('part_name')])
                ->where(['part_no' => $this->request->data('part_no')]);
            foreach($inStocks as $ins){
                $inStockQty += $ins->quantity;
            }
            $stockOuts = $this->StockOut->find()
                ->where(['part_name' => $this->request->data('part_name')])
                ->where(['part_no' => $this->request->data('part_no')]);
            foreach($stockOuts as $so){
                $stockOutQty += $so->quantity;
            }
            $result = new \stdClass();
            $result->stock_available = $inStockQty - $stockOutQty;
            print_r(json_encode($result, JSON_PRETTY_PRINT));
            die();
        }
    }

}
