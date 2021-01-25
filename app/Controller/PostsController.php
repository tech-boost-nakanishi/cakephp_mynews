<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}

	public $helpers = array('Html', 'Form');

	public function index() {
		$this->set('posts', $this->Post->find('all'));
	}

	public function add(){
		if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('記事を投稿しました!', 'default', array('class'=>'alert alert-success'));
                $this->redirect(array('action'=>'view', $this->Post->getLastInsertID()));
            }
        }
	}

	public function view($id = null){
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
	}

	public function list($id = null){
		$posts = $this->Post->find('all', array(
			'conditions' => array('Post.user_id' => $id),
		));
		$this->set('posts', $posts);
	}

	public function edit($id = null){
		$this->Post->id = $id;
		if($this->Post->field('user_id') == $this->Session->read('Auth.User.id')){
			if($this->request->is('get')){
				$this->request->data = $this->Post->read();
			}else{
				if($this->Post->save($this->request->data)){
					$this->Session->setFlash('記事を更新しました!', 'default', array('class'=>'alert alert-success'));
					$this->redirect(array('action'=>'view', $id));
				}
			}
		}
	}

	public function delete($id = null){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->Post->delete($id)){
			$this->Session->setFlash('記事を削除しました!', 'default', array('class'=>'alert alert-danger'));
			$this->redirect($this->request->referer());
		}
	}
}
