<?php
App::uses('AppModel', 'Model');
/**
 * Question Model
 *
 * @property Answer $Answer
 * @property SigData $SigData
 */
class Question extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'published' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'question_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'SigData' => array(
			'className' => 'SigData',
			'foreignKey' => 'question_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function afterSave($created, $options = array()) {
		if (!empty($this->data[$this->alias]['state'])) {
			if ($this->data[$this->alias]['state'] == 'Open' && !$this->field('opened')) {
				$this->saveField('opened', date('Y-m-d H:i:s'));
			} elseif ($this->data[$this->alias]['state'] == 'Closed' && !$this->field('closed')) {
				$this->saveField('closed', date('Y-m-d H:i:s'));
			}
		}		
	}
}
