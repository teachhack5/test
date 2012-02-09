<?php
App::uses('AppModel', 'Model');
/**
 * Resourceobject Model
 *
 * @property Resource $Resource
 * @property Filestore $Filestore
 * @property Resourcetype $Resourcetype
 */
class Resourceobject extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'resource_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'filestore_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'resourcetype_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'uri' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Resource' => array(
			'className' => 'Resource',
			'foreignKey' => 'resource_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Filestore' => array(
			'className' => 'Filestore',
			'foreignKey' => 'filestore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Resourcetype' => array(
			'className' => 'Resourcetype',
			'foreignKey' => 'resourcetype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
