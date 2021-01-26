<?php
App::uses('Model', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class User extends AppModel {
	public $hasMany = 'Post';

	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $passwordHasher = new SimplePasswordHasher();
	        $this->data[$this->alias]['password'] = $passwordHasher->hash(
	            $this->data[$this->alias]['password']
	        );
	    }
	    return true;
	}

	public $validate = array(
		'username' => array(
			'rule' => 'notBlank',
			'message' => '空です'
		),
	    'email' => array(
	    	'notBlank' => array(
	    		'rule' => 'notBlank',
				'message' => '空です'
	    	),
	    	'isUnique' => array(
	    		'rule' => 'isUnique',
				'message' => 'このメールアドレスは存在します'
	    	),
	    	'email' => array(
		        'rule' => array('email'),
		        'message' => '有効なメールアドレスを入力してください。'
		    ),
		),
		'password' => array(
			'minLength' => array(
		        'rule' => array('minLength', 8),
		        'message' => 'パスワードは最低8文字以上にしてください。'
		    ),
		    'notBlank' => array(
		        'rule' => 'notBlank',
		        'message' => '空です'
		    ),
		)
	);
}
