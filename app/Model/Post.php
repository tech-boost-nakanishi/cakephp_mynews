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
class Post extends AppModel {
	public $belongsTo = 'User';

	public $validate = array(
	    'title' => array(
			'rule' => 'notBlank',
			'message' => '空です'
		),
		'body' => array(
			'rule' => 'notBlank',
			'message' => '空です'
		)
	);
}
