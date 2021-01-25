<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('signup', 'login', 'logout');
	}

	public function signup() {
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				// そのままログイン処理してしまう。
				$passwordHasher = new SimplePasswordHasher();
				$this->User->save(array(
					'password'=>$passwordHasher->hash($this->request->data['User']['password'])
				));
				$this->Auth->login($this->request->data['User']);

				// リダイレクト
				$this->Session->setFlash('登録しました!', 'default', array('class'=>'alert alert-success'));
				$this->redirect(array('action' => 'dashboard'));
			}
		}
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
		$this->set('auth1', $this->Auth->user('password'));
	}

	public function logout() {
		if ($this->Auth->logout()) {
			$this->Session->setFlash('ログアウトしました！', 'default', array('class'=>'alert alert-success'));
			$this->redirect(array('controller'=>'posts', 'action'=>'index'));
		}
	}
}
