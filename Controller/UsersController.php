<?php
App::uses('AuthenticationAppController', 'Authentication.Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Users Controller
 *
 */
class UsersController extends AuthenticationAppController 
{
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

    /**
     * Magic Auth component logout
     *
     * @return null
     */
    public function logout() 
    {
        $this->Session->setFlash("You've been logged out.");
        $this->redirect($this->Auth->logout());
    }

    /**
     * Magic Auth component logout
     *
     * @return null
     */
    public function admin_logout() 
    {
        $this->Session->setFlash("You've been logged out.");
        $this->redirect($this->Auth->logout());
    }

    /**
     * Magic Auth component login
     *
     * @return null
     */
    public function login() 
    {
        // if user is already logged in redirect
        $logged_in = $this->Auth->user();
        if (!empty($logged_in)) {
            $this->redirect('/');
        }

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
    }

    /**
     * Magic Auth component login
     *
     * @return null
     */
    public function admin_login() 
    {
        // if user is already logged in redirect
        $logged_in = $this->Auth->user();
        if (!empty($logged_in)) {
            $this->redirect('/admin');
        }

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }
    }

    /**
     * Register a new admin user
     *
     * @return null
     */
    public function admin_register() 
    {
        /*
        if ($this->User->save($this->request->data)) {
            $id = $this->User->id;
            $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
            $this->Auth->login($this->request->data['User']);
            $this->redirect('/admin/users');
        }
        */
    }

    /**
     * Allow an admin user to change their password
     *
     * @return null
     */
    public function admin_changepassword()
    {
        if ($this->request->is('post')) {
            // only allow request is for currently logged in user
            if ($this->request->data['User']['id'] == $this->Auth->user('id')) {
                // make sure passwords match
                if ($this->request->data['password'] === $this->request->data['password2']) {
                    $this->User->read(null, $this->Auth->user('id'));
                    $this->User->set('password',  AuthComponent::password($this->request->data['password']));
                    $this->User->save();
                    $this->Session->setFlash(__("You've successfully updated your password!"));
                    $this->redirect('/admin');
                } else {
                    $this->Session->setFlash(__('Passwords do not match. Please try again.'));
                }
            }
        }

        $this->set('user_id', $this->Auth->user('id'));
    }

    /**
     * Admin add new user
     *
     * @return null
     */
    public function admin_add()
    {
		if ($this->request->is('post')) {
            if ($this->request->data['User']['password'] === $this->request->data['User']['password2']) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Passwords do not match. Please try again.'));
            }
		}
    }

    /**
     * Admin function to list all users
     *
     * @return void
     */
	public function admin_index() 
    {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

    /**
     * View info about a single user in the admin
     *
     * @param int $id
     * @return null
     */
    public function admin_view($id)
    {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
    }

    /**
     * Admin function to edit a user
     *
     * @param int $id
     * @return null
     */
    public function admin_edit($id)
    {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->request->data['User']['password'] === $this->request->data['User']['password2']) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Passwords do not match. Please try again.'));
            }
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
    }

    /**
     * Admin function to delete a user
     *
     * @param int $id
     * @return null
     */
    public function admin_delete($id)
    {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
    }

    /**
     * Allow admin_login to get through the Auth component
     *
     * @return null
     */
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('admin_login');
    }

}
