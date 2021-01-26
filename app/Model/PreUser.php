<?php
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class PreUser extends AppModel {
	public $validate = array(
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
		)
	);
}
