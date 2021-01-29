<?php
class Mynews extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'mynews';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'posts' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
					'title' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
					'body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_0900_ai_ci', 'engine' => 'InnoDB'),
				),
				'users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'username' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
					'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
					'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_0900_ai_ci', 'engine' => 'InnoDB'),
				),
				'pre_users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
					'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
					'token' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8mb4_0900_ai_ci', 'charset' => 'utf8mb4'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_0900_ai_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'posts', 'users', 'pre_users'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
