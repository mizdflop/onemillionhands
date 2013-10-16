<?php
App::uses('AppController', 'Controller');
/**
 * Analyses Controller
 *
 * @property Analysis $Analysis
 * @property PaginatorComponent $Paginator
 */
class AnalysesController extends AppController {

	//public $uses = array('Analysis','Analysis');
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
		$this->Analysis->recursive = 0;
		$this->set('analyses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Analysis->exists($id)) {
			throw new NotFoundException(__('Invalid analysis'));
		}
		$options = array('conditions' => array('Analysis.' . $this->Analysis->primaryKey => $id));
		$this->set('analysis', $this->Analysis->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Analysis->create();
			if ($this->Analysis->save($this->request->data)) {
				$this->Session->setFlash('The analysis has been saved', null, array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The analysis could not be saved. Please, try again.', null, array('class' => 'danger'));
			}
		}
		$analysisTypes = $this->Analysis->AnalysisType->find('list');
		$players = $this->Analysis->Player->find('list');
		$this->set(compact('analysisTypes','players'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Analysis->exists($id)) {
			throw new NotFoundException(__('Invalid analysis'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Analysis->save($this->request->data)) {
				$this->Session->setFlash('The analysis has been saved.', null, array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
		} else {
			$options = array(
				'conditions' => array('Analysis.' . $this->Analysis->primaryKey => $id),
				'contain' => array('AnalysisType','Player')	
			);
			$this->request->data = $this->Analysis->find('first', $options);
		}
		$analysisTypes = $this->Analysis->AnalysisType->find('list');
		$players = $this->Analysis->Player->find('list');
		$this->set(compact('analysisTypes','players'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Analysis->id = $id;
		if (!$this->Analysis->exists()) {
			throw new NotFoundException(__('Invalid analysis'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Analysis->delete()) {
			$this->Session->setFlash('The analysis has been deleted.', null, array('class' => 'success'));
		} else {
			$this->Session->setFlash('The analysis could not be deleted. Please, try again.', null, array('class' => 'danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
