<?php
App::uses('AppController', 'Controller');
/**
 * Resources Controller
 *
 * @property Resource $Resource
 */
class ResourcesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Resource->recursive = 0;
		$this->set('resources', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Resource->id = $id;
		if (!$this->Resource->exists()) {
			throw new NotFoundException(__('Invalid resource'));
		}
		$this->set('resource', $this->Resource->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Resource->create();
			if ($this->Resource->save($this->request->data)) {
				$this->Session->setFlash(__('The resource has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resource could not be saved. Please, try again.'));
			}
		}
		$authors = $this->Resource->Author->find('list');
		$this->set(compact('authors'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Resource->id = $id;
		if (!$this->Resource->exists()) {
			throw new NotFoundException(__('Invalid resource'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Resource->save($this->request->data)) {
				$this->Session->setFlash(__('The resource has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resource could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Resource->read(null, $id);
		}
		$authors = $this->Resource->Author->find('list');
		$this->set(compact('authors'));
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
		$this->Resource->id = $id;
		if (!$this->Resource->exists()) {
			throw new NotFoundException(__('Invalid resource'));
		}
		if ($this->Resource->delete()) {
			$this->Session->setFlash(__('Resource deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Resource was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
