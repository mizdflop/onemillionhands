<?php
App::uses('AppController', 'Controller');
/**
 * Trends Controller
 *
 * @property Trend $Trend
 * @property PaginatorComponent $Paginator
 */
class TrendsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Trend->recursive = 0;
		$this->set('trends', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Trend->exists($id)) {
			throw new NotFoundException(__('Invalid trend'));
		}
		$options = array('conditions' => array('Trend.' . $this->Trend->primaryKey => $id));
		$this->set('trend', $this->Trend->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Trend->create();
			if ($this->Trend->save($this->request->data)) {
				$this->Session->setFlash('The trend has been saved.', null, array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		$players = $this->Trend->Player->find('list');
		$analyses = $this->Trend->Analysis->find('list');
		$this->set(compact('players', 'analyses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Trend->exists($id)) {
			throw new NotFoundException(__('Invalid trend'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Trend->save($this->request->data)) {
				$this->Session->setFlash('The trend has been saved.', null, array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		} else {
			$options = array(
				'conditions' => array('Trend.' . $this->Trend->primaryKey => $id),
				'contain' => array('Analysis','Player')	
			);
			$this->request->data = $this->Trend->find('first', $options);
		}
		$players = $this->Trend->Player->find('list');
		$analyses = $this->Trend->Analysis->find('list');
		$this->set(compact('players', 'analyses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Trend->id = $id;
		if (!$this->Trend->exists()) {
			throw new NotFoundException(__('Invalid trend'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Trend->delete()) {
			$this->Session->setFlash('The trend has been deleted.', null, array('class' => 'success'));
		} else {
			$this->Session->setFlash('The trend could not be deleted. Please, try again.', null, array('class' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
