<?php
App::uses('AppController', 'Controller');
/**
 * Filestores Controller
 *
 * @property Filestore $Filestore
 */
class FilestoresController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Filestore->recursive = 0;
		$this->set('filestores', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Filestore->id = $id;
		if (!$this->Filestore->exists()) {
			throw new NotFoundException(__('Invalid filestore'));
		}
		$this->set('filestore', $this->Filestore->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Filestore->create();
			if ($this->Filestore->save($this->request->data)) {
				$this->Session->setFlash(__('The filestore has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filestore could not be saved. Please, try again.'));
			}
		}
		$servers = $this->Filestore->Server->find('list');
		$this->set(compact('servers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Filestore->id = $id;
		if (!$this->Filestore->exists()) {
			throw new NotFoundException(__('Invalid filestore'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Filestore->save($this->request->data)) {
				$this->Session->setFlash(__('The filestore has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The filestore could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Filestore->read(null, $id);
		}
		$servers = $this->Filestore->Server->find('list');
		$this->set(compact('servers'));
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
		$this->Filestore->id = $id;
		if (!$this->Filestore->exists()) {
			throw new NotFoundException(__('Invalid filestore'));
		}
		if ($this->Filestore->delete()) {
			$this->Session->setFlash(__('Filestore deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Filestore was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
