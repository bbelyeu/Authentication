<?php
App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property EmployerAccount $EmployerAccount
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
	public $displayField = 'username';

    /**
     * Validation rules
     *
     * @var array
     */
	public $validate = array(
		'username' => array(
			'email' => array(
				'rule' => array('email'),
			),
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasOne associations
     *
     * @var array
     */
	public $hasOne = array(
		'EmployerAccount' => array(
			'className' => 'EmployerAccount',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    public function beforeSave($options = array())
    {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }
}
