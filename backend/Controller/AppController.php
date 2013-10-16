<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 *
 * $this->Session->setFlash('testing', null, array('class' => 'success'));
 *
 */
	App::uses('Controller', 'Controller');
	App::uses('AuthComponent', 'Controller/Component');
	
/**
 * Application Controller
 *
 */
class AppController extends Controller {
	
	public $helpers = array('Session', 'Form' => array('className' => 'Boots.BootsForm'), 'Html', 'Js', 'Number', 'Text', 'Time');
	
	public $components = array(
			'Cookie',
			'Session',
			'Auth' => array(
				'authenticate' => array(
					AuthComponent::ALL => array(
						'fields' => array('username' => 'email', 'password' => 'password'),
						'userModel' => 'User',
						'recursive' => -1,
					),
					'Form'
				),
				'authorize' => array('Controller'),
				'loginRedirect' => array('plugin' => null, 'controller' => 'users', 'action' => 'home'),
				'loginAction' => array('plugin' => null, 'controller' => 'users', 'action' => 'login'),
				'logoutRedirect' => array('plugin' => null, 'controller' => 'pages', 'action' => 'display', 'home'),
			),
			'RequestHandler',
	);
	
	function beforeFilter() {
	
		if (!CakeSession::started()) {
			CakeSession::start();
		}
		$this->Auth->allow();
	}
	
	function beforeRender() {
	
		if ($this->request->isAll(array('ajax','post'))) {
			$validationErrors = array();
			$redirect = $this->request->redirect;
			if (!empty($this->uses) && is_array($this->uses)) {
				foreach ($this->uses as $currentModel) {
					$currentObject = ClassRegistry::getObject($currentModel);
					if (is_a($currentObject, 'Model') && !empty($currentObject->validationErrors)) {
						$validationErrors[$currentObject->alias] = $currentObject->validationErrors;
					}
				}
			}
			$this->set(array('validationErrors' => $validationErrors,'redirect' => $redirect,'_serialize' => array('validationErrors','redirect')));
		} else {
			/*
			$auth = null;
			if ($this->Auth->user()) {
				$this->loadModel('User');
				$user = $this->User->find('first',array(
						'conditions' => array('User.id' => $this->Auth->user('id')),
						'contain' => array('Facebook')
				));
				$auth = $user;
			}
			$this->set(compact('auth'));
			*/
		}
	}
	
	public function isAuthorized($user = null) {
	
		// Any registered user can access public functions
		if (empty($this->request->params['admin'])) {
			return true;
		}
	
		// Only admins can access admin functions
		if (isset($this->request->params['admin'])) {
			return (bool)($user['role'] === 'admin');
		}
	
		// Default deny
		return false;
	}
	
	public function redirect($url, $status = null, $exit = true) {
		if ($this->request->is('ajax')) {
			$this->request->redirect = Router::url($url);
		} else {
			parent::redirect($url,$status,$exit);
		}
	}	
}
