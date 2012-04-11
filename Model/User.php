<?php
App::uses('AuthComponent', 'Controller/Component');
App::uses('AuthenticationAppModel', 'Authentication.Model');

/**
 * User Model
 *
 */
class User extends AuthenticationAppModel 
{
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

    public function beforeSave($options = array())
    {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }
}
