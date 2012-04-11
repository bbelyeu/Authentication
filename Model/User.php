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
     * Enum fields for roles
     * This is primarily used in View files to create select boxes
     * Array key is the html select value
     * Array value is the part displayed to the user
     *
     * @var array
     */
    public static $roles = array(
        'Admin'     => 'Admin',
        'Agent'     => 'Agent',
        'Editor'    => 'Editor',
        'Manager'   => 'Manager'
    );

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
