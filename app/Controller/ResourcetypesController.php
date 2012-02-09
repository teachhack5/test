<?php
App::uses('AppController', 'Controller');
/**
 * Resourcetypes Controller
 *
 * @property Resourcetype $Resourcetype
 */
class ResourcetypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Resourcetype->recursive = 0;
		$this->set('resourcetypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Resourcetype->id = $id;
		if (!$this->Resourcetype->exists()) {
			throw new NotFoundException(__('Invalid resourcetype'));
		}
		$this->set('resourcetype', $this->Resourcetype->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Resourcetype->create();
			if ($this->Resourcetype->save($this->request->data)) {
				$this->Session->setFlash(__('The resourcetype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resourcetype could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Resourcetype->id = $id;
		if (!$this->Resourcetype->exists()) {
			throw new NotFoundException(__('Invalid resourcetype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Resourcetype->save($this->request->data)) {
				$this->Session->setFlash(__('The resourcetype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resourcetype could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Resourcetype->read(null, $id);
		}
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
		$this->Resourcetype->id = $id;
		if (!$this->Resourcetype->exists()) {
			throw new NotFoundException(__('Invalid resourcetype'));
		}
		if ($this->Resourcetype->delete()) {
			$this->Session->setFlash(__('Resourcetype deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Resourcetype was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
