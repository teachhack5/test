<?php
App::uses('AppController', 'Controller');
/**
 * Subnets Controller
 *
 * @property Subnet $Subnet
 */
class SubnetsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Subnet->recursive = 0;
		$this->set('subnets', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Subnet->id = $id;
		if (!$this->Subnet->exists()) {
			throw new NotFoundException(__('Invalid subnet'));
		}
		$this->set('subnet', $this->Subnet->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Subnet->create();
			if ($this->Subnet->save($this->request->data)) {
				$this->Session->setFlash(__('The subnet has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subnet could not be saved. Please, try again.'));
			}
		}
		$locations = $this->Subnet->Location->find('list');
		$this->set(compact('locations'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Subnet->id = $id;
		if (!$this->Subnet->exists()) {
			throw new NotFoundException(__('Invalid subnet'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subnet->save($this->request->data)) {
				$this->Session->setFlash(__('The subnet has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subnet could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Subnet->read(null, $id);
		}
		$locations = $this->Subnet->Location->find('list');
		$this->set(compact('locations'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Subnet->id = $id;
		if (!$this->Subnet->exists()) {
			throw new NotFoundException(__('Invalid subnet'));
		}
		if ($this->Subnet->delete()) {
			$this->Session->setFlash(__('Subnet deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subnet was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
