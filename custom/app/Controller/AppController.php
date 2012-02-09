<?php

class AppController extends Controller {
	
	var $uses = array('User', 'Group', 'Acl');
	public $components = array(
		'Acl',
		'Session',
		'Auth' => array(
			'loginAction' => array(
				'plugin' => 'nice_auth',
				'controller' => 'users',
				'action' => 'login'
				),
			'authError' => 'You are not authorized to view that page',
			)
		);
		
	public function beforeFilter() {
		$this->Auth->authorize = array(
    	AuthComponent::ALL => array('actionPath' => 'controllers'),
    		'Actions'
			);
		}
  
	}

?>
