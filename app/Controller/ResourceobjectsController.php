<?php
App::uses('AppController', 'Controller');
/**
 * Resourceobjects Controller
 *
 * @property Resourceobject $Resourceobject
 */
class ResourceobjectsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Resourceobject->recursive = 0;
		$this->set('resourceobjects', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Resourceobject->id = $id;
		if (!$this->Resourceobject->exists()) {
			throw new NotFoundException(__('Invalid resourceobject'));
		}
		$this->set('resourceobject', $this->Resourceobject->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Resourceobject->create();
			if ($this->Resourceobject->save($this->request->data)) {
				$this->Session->setFlash(__('The resourceobject has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resourceobject could not be saved. Please, try again.'));
			}
		}
		$resources = $this->Resourceobject->Resource->find('list');
		$filestores = $this->Resourceobject->Filestore->find('list');
		$resourcetypes = $this->Resourceobject->Resourcetype->find('list');
		$this->set(compact('resources', 'filestores', 'resourcetypes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Resourceobject->id = $id;
		if (!$this->Resourceobject->exists()) {
			throw new NotFoundException(__('Invalid resourceobject'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Resourceobject->save($this->request->data)) {
				$this->Session->setFlash(__('The resourceobject has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resourceobject could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Resourceobject->read(null, $id);
		}
		$resources = $this->Resourceobject->Resource->find('list');
		$filestores = $this->Resourceobject->Filestore->find('list');
		$resourcetypes = $this->Resourceobject->Resourcetype->find('list');
		$this->set(compact('resources', 'filestores', 'resourcetypes'));
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
		$this->Resourceobject->id = $id;
		if (!$this->Resourceobject->exists()) {
			throw new NotFoundException(__('Invalid resourceobject'));
		}
		if ($this->Resourceobject->delete()) {
			$this->Session->setFlash(__('Resourceobject deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Resourceobject was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
