<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
	public $uses = 'PreUser';

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('signup', 'login', 'logout', 'pre_check', 'main_check');
	}

	public function signup() {
		if ($this->request->is('post')) {
			$email = $this->request->data['PreUser']['email'];
			$token = AuthComponent::password(random_int(111111, 999999));
        	if($this->PreUser->save(['email' => $email,'token' => $token])){
		        $cakemail = new CakeEmail('default');
		        $sent = $cakemail
		            ->to($email)
		            ->subject('仮登録ありがとうございます')
		            ->send(
		            	'仮登録ありがとうございます。' . "\n" .
		            	'下記URLをクリックして本登録を完了してください。' . "\n" .
		            	'http://' . $_SERVER['HTTP_HOST'] . '/signup/emailcheck/' . $email . '/' . $token
		            );

	        	$this->redirect(array('action'=>'pre_check'));
        	}
		}
	}

	public function pre_check(){}

	public function main_check(){
		$email = $this->request->params['email'];
        $token = $this->request->params['token'];
        if($this->request->is('get')){
        	$this->loadModel('PreUser');
        	$preuser = $this->PreUser->find('first', array(
        		'conditions' => array(
        			'PreUser.email' => $email,
        			'PreUser.token' => $token
        		),
        	));
        	if(!$preuser){
        		throw new NotFoundException();
        	}
        }else if($this->request->is('post') || $this->request->is('put')){
        	if($this->request->data['User']['password'] == $this->request->data['User']['confirmpassword']){
        		unset($this->request->data['User']['confirmpassword']);
        		$this->loadModel('User');
            	if ($this->User->save($this->request->data)) {
        			if ($this->Auth->login()) {
						$this->Session->setFlash('登録ありがとうございます！', 'default', array('class'=>'alert alert-success'));
						$this->redirect(array('action'=>'dashboard'));
					}
				}
        	}else{
        		$this->Session->setFlash('パスワードが一致しません!', 'default', array('class'=>'alert alert-danger'));
        	}
        }
        $this->set('email', $email);
        $this->set('token', $token);
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash('ログインしました！', 'default', array('class'=>'alert alert-success'));
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash('メールアドレスかパスワードが違います!', 'default', array('class'=>'alert alert-danger'));
			}
		}
	}

	public function dashboard(){
		$this->set('auth1', $this->Auth->user());
	}

	public function logout() {
		if ($this->Auth->logout()) {
			$this->Session->setFlash('ログアウトしました！', 'default', array('class'=>'alert alert-success'));
			$this->redirect(array('controller'=>'posts', 'action'=>'index'));
		}
	}
}
