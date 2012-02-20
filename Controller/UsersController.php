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
