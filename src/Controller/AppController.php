<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'GTR',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ],
            'unauthorizedRedirect' => [
                'controller' => 'GTR',
                'action' => 'dashboard',
                'prefix' => false
            ]
        ]);

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
    	$this->loadModel('LogisticFinishGood');
        $lfgReqCount = $this->LogisticFinishGood->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('MaterialIssueTicket');
        $mitReqCount = $this->MaterialIssueTicket->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('MrReport');
        $mrReqCount = $this->MrReport->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('NbdoReport');
        $nbdoReqCount = $this->NbdoReport->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('BdoReport');
        $bdoReqCount = $this->BdoReport->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('RtvnReport');
        $rtvnReqCount = $this->RtvnReport->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('ScnReport');
        $scnReqCount = $this->ScnReport->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('GatePass');
        $gpReqCount = $this->GatePass->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadModel('Gtr');
        $gtrReqCount = $this->Gtr->find('all')
            ->where(['stat' => 'pending'])
            ->count();
        $this->loadComponent('Auth');
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        $this->set('role', $this->Auth->user('role'));
        $this->set('lfgReqCount', $lfgReqCount);
        $this->set('mitReqCount', $mitReqCount);
        $this->set('mrReqCount', $mrReqCount);
        $this->set('nbdoReqCount', $nbdoReqCount);
        $this->set('bdoReqCount', $bdoReqCount);
        $this->set('rtvnReqCount', $rtvnReqCount);
        $this->set('scnReqCount', $scnReqCount);
        $this->set('gpReqCount', $gpReqCount);
        $this->set('gtrReqCount', $gtrReqCount);
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['view', 'display', 'searchApi', 'stockAvailable', 'productionReport']);
    }

    public function isAuthorized($user){
        if(isset($user['role']) && $user['role'] == 'admin'){
            $allowedActions = ['search', 'addItems', 'addStockOut', 'add', 'report', 'index', 'logout', 'stockOut', 'view', 'edit','dashboard'];
            if(in_array($this->request->action, $allowedActions)){
                return true;
            }
        }
        if(isset($user['role']) && $user['role'] == 'store-manager'){
            $allowedActions = ['index', 'requested', 'report', 'approve', 'logout', 'view','dashboard'];
            if(in_array($this->request->action, $allowedActions)){
                return true;
            }
        }
        return false;
    }

}
