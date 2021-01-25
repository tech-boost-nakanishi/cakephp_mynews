<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Security', 'DebugKit.Toolbar', 'Session',
		'Auth' => array(
			'loginAction' => array('controller' => 'users', 'action' => 'login'),
			'loginRedirect' => array('controller' => 'users', 'action' => 'dashboard'),
			'authenticate' => array('Form' => array('fields' => Array('username' => 'email')))
		)
	);

	public $uses = array('User');


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->validatePost = false;
		$this->Security->csrfUseOnce = false;
		$auth = $this->Auth->user();
		$user = null;
		if($auth){
			$passwordHasher = new SimplePasswordHasher();
			$user = $this->User->find('first', array(
		        'conditions' => array(
		        	'email' => $this->Session->read('Auth.User.email'),
		        )
		    ));
		    $auth = $user['User'];
			$this->Session->write('Auth.User.id', $auth['id']);
			unset($auth['password']);
		}
		$this->set(compact('auth'));
	}
}
