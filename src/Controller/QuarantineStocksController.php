<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * QuarantineStocks Controller
 *
 * @property \App\Model\Table\QuarantineStocksTable $QuarantineStocks
 */
class QuarantineStocksController extends AppController
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
    }

    public function report(){
        $quarantineStocks = $this->paginate($this->QuarantineStocks->find('all',['order'=>['QuarantineStocks.id'=>'desc']]));

        $this->set(compact('quarantineStocks'));
        $this->set('_serialize', ['quarantineStocks']);
    }

    public function addItems(){
        $this->autoRender = false;
        $quarantineTable = TableRegistry::get('QuarantineStocks');
        $quarantineData = array();
        if($this->request->is('post')){
            if(!empty($this->request->data)){
                $total = $this->request->data['total'];
                for($i = 1; $i <= $total; $i++){
                    $quarantineData[$i]['date'] = $this->request->data('date'.$i);
                    $quarantineData[$i]['tender_no'] = $this->request->data('tender_no'.$i);
                    $quarantineData[$i]['prn_no'] = $this->request->data('prn_no'.$i);
                    $quarantineData[$i]['trs_code'] = $this->request->data('trs_code'.$i);
                    $quarantineData[$i]['part_no'] = $this->request->data('part_no'.$i);
                    $quarantineData[$i]['part_name'] = $this->request->data('part_name'.$i);
                    $quarantineData[$i]['quantity'] = $this->request->data('quantity'.$i);
                    $quarantineData[$i]['pic_store'] = $this->request->data('pic_store'.$i);
                    $quarantineData[$i]['pic_section'] = $this->request->data('pic_section'.$i);
                    $quarantineData[$i]['rack'] = $this->request->data('rack'.$i);
                    $quarantineData[$i]['bin'] = $this->request->data('bin'.$i);
                    $quarantineData[$i]['level'] = $this->request->data('level'.$i);
                }
                $stocks = $quarantineTable->newEntities($quarantineData);
                foreach($stocks as $stock){
                    $quarantineTable->save($stock);
                }
                $this->redirect(['action' => 'report']);
            }
        }
    }
    
    public function view($id = null){
        $qs = $this->QuarantineStocks->get($id, [
            'contain' => []
        ]);
        $this->set(compact('qs'));
        $this->set('_serialize', ['qs']);
        $this->set('pic', $this->Auth->user('username'));
    }

}
