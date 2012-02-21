<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 */
class UsersController extends AppController 
{
    /**
     * Scaffold
     *
     * @var mixed
     */
	public $scaffold = 'admin';

    /**
     * The components array allows you to set which Components a controller will use
     * Tell Cake what components to use in conjunction with the current controller
     * This gets merged with the child controllers components
     * Default components no longer need to be redeclared
     * Some components may need configured when declaring
     *
     * @link http://book.cakephp.org/2.0/en/controllers.html#components-helpers-and-uses
     * @link http://book.cakephp.org/2.0/en/controllers/components.html#configuring-components
     * @var array
     */
    public $components = array('Session');

    public function logout() 
    {
        $this->redirect($this->Auth->logout());
    }

    public function login() 
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
    }

    public function admin_register() 
    {
        if ($this->User->save($this->request->data)) {
            $id = $this->User->id;
            $this->request->data['User'] = array_merge($this->request->data["User"], array('id' => $id));
            $this->Auth->login($this->request->data['User']);
            $this->redirect('/admin/users');
        }
    }
}
