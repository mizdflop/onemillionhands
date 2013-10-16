<?php

App::uses('FormHelper', 'View/Helper');

class BootsFormHelper extends FormHelper {

/**
 * 
 * @var unknown
 */	
	const FORM_DEFAULT = 1;
	
/**
 * 
 * @var unknown
 */	
	const FORM_INLINE = 'form-inline';
	
/**
 * 
 * @var unknown
 */	
	const FORM_HORIZONTAL = 'form-horizontal';	
	
/**
 * 
 * @var unknown
 */	
	const CLASS_INPUT = 'form-control';
	
/**
 * 
 * @var unknown
 */	
	const CLASS_DIV = 'form-group';

/**
 * 
 * @var unknown
 */	
	const CLASS_LABEL = 'control-label';
	
/**
 * 
 */
	protected static $FORM_TYPE = null;	
	
	protected $colNum = 3;

/**
 * (non-PHPdoc)
 * @see FormHelper::create()
 */	
	public function create($model = null, $options = array()) {

		$default = array(
			'role' => 'form',
			'col' => 3
		);
		if (!empty($options['col'])) {
			$default['col'] = $options['col'];
			unset($options['col']);
		}		
		$this->colNum = $default['col'];
		
		$formClasses = preg_split("/[\s]+/", $this->_extractOption('class', $options), null, PREG_SPLIT_NO_EMPTY);
		if (in_array(self::FORM_HORIZONTAL, $formClasses)) {
			$default['inputDefaults'] = 
				array(
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'div' => array('class' => self::CLASS_DIV),
					'class' => self::CLASS_INPUT,
					'label' => array('class' => sprintf('col-lg-%d %s', $default['col'], self::CLASS_LABEL)),
					'between' => sprintf('<div class="col-lg-%d">', 12 - $default['col']),
					'after' => '</div>',					
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block')),
				);				
			self::$FORM_TYPE = self::FORM_HORIZONTAL;
		} elseif (in_array(self::FORM_INLINE, $formClasses)) {
			$default['inputDefaults'] =
				array(
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'div' => array('class' => self::CLASS_DIV),
					'class' => self::CLASS_INPUT,
					'label' => array('class' => 'sr-only'),
					'error' => false,
				);			 
			self::$FORM_TYPE = self::FORM_INLINE;
		} else {
			$default['inputDefaults'] = 
				array(
					'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
					'div' => array('class' => self::CLASS_DIV),
					'class' => self::CLASS_INPUT,
					'label' => array('class' => self::CLASS_LABEL),
					'error' => array('attributes' => array('wrap' => 'p', 'class' => 'help-block')),
				);
			self::$FORM_TYPE = self::FORM_DEFAULT;
		}
		
		$options = Hash::merge($default, $options);
		
		//$options['inputDefaults']['div'] = $this->addClass($options['inputDefaults']['div'],'has-error');
		
		return parent::create($model, $options);
	}
	
/**
 * (non-PHPdoc)
 * @see FormHelper::input()
 */	
	public function input($fieldName, $options = array()) {
		
		if (!empty($options['label'])) {
			if (!is_array($options['label'])) {
				$label = array_merge(array('text' => $options['label']),$this->_inputDefaults['label']);
			} else {
				$label = array_merge($options['label'],$this->_inputDefaults['label']);
			}
		} else {
			if (isset($options['label']) && $options['label'] === false) {
				$label = false;				
			} else {
				$label = $this->_inputDefaults['label'];
			}
		}		
		$this->setEntity($fieldName);
		$options = $this->_parseOptions($options);
		
		// Fix checkbox
		if ($options['type'] === 'checkbox') {
			if (self::$FORM_TYPE == self::FORM_HORIZONTAL) {
				$label['class'] = false;
				$opts = array(
					'label' => $label,
					'class' => false,
					'before' => sprintf('<div class="col-lg-offset-%d col-lg-%d"><div class="checkbox">',$this->colNum,12-$this->colNum),
					'between' => null,
					'after' => '</div></div>'
				);				
			} elseif (self::$FORM_TYPE == self::FORM_INLINE) {
				$label['class'] = false;
				$opts = array(
					'format' => array('before', 'between', 'input', 'label', 'error', 'after'),						
					'label' => $label,
					'class' => false,
					'before' => null,
					'between' => null,
					'after' => null,
					'div' => 'checkbox'	
				);				
			} else {
				$opts = array(
					'label' => $label,
					'class' => false,
					'before' => '<div class="checkbox">',
					'between' => null,
					'after' => '</div>'
				);
			}
			$options = array_merge($options, $opts);
		}
		
		// Fix radio
		if ($options['type'] === 'radio') {
			$className = !empty($options['class']) && $options['class'] !== self::CLASS_INPUT?$options['class']:'radio';
			unset($options['class']);
			if (self::$FORM_TYPE == self::FORM_HORIZONTAL) {
				$opts = array(
					'legend' => false,
					'format' => array('label', 'before', 'input', 'between', 'after', 'error'),
					'class' => false,
				);				
				if ($label !== false) {
					$opts = array_merge($opts, array(
						'before' => sprintf('%s<div class="col-lg-%d"><div class="%s">',
								$this->_inputLabel($fieldName, $label, $options),12-$this->colNum,$className),
						'separator' => '</div><div class="'.$className.'">',
						'after' => '</div></div>',
					));						
				} else {
					$opts = array_merge($opts, array(
						'before' => sprintf('<div class="col-lg-offset-%d col-lg-%d"><div class="%s">',$this->colNum,12-$this->colNum,$className),
						'separator' => '</div><div class="'.$className.'">',
						'after' => '</div></div>',
					));						
				}
			} elseif (self::$FORM_TYPE == self::FORM_INLINE) {
				$opts = array(
					'legend' => false,
					'format' => array('label', 'before', 'input', 'between', 'after', 'error'),
					'class' => false,
					'before' => '<div class="radio-inline">',
					'separator' => '</div><div class="radio-inline">',
					'after' => '</div>',
				);
			} else {
				if ($label !== false) {
					$label = $this->_inputLabel($fieldName, $label, $options);
				}				
				$opts = array(
					'legend' => false,
					'format' => array('label', 'before', 'input', 'between', 'after', 'error'),
					'class' => false,
					'before' => $label.'<div class="clearfix"><div class="'.$className.'">',
					'separator' => '</div><div class="'.$className.'">',
					'after' => '</div></div>',
				);
			}			
			$options = array_merge($options, $opts);
		}
		
		// Fix multiple checkboxes
		if ($options['type'] === 'select' && isset($options['multiple']) && $options['multiple'] === 'checkbox') {
			$className = !empty($options['class']) && $options['class'] !== self::CLASS_INPUT?$options['class']:'checkbox';
			unset($options['class']);
			if (self::$FORM_TYPE == self::FORM_HORIZONTAL) {
				if ($label !== false) {
					$opts = array(
						'class' => $className,
						'label' => $label,
						'between' => sprintf('<div class="col-lg-%d">',12-$this->colNum),
						'after' => '</div>',
					);						
				} else {
					$opts = array(
						'class' => $className,
						'label' => $label,
						'between' => sprintf('<div class="col-lg-offset-%d col-lg-%d">',$this->colNum,12-$this->colNum),
						'after' => '</div>',
					);						
				}
			} elseif (self::$FORM_TYPE == self::FORM_INLINE) {
				$opts = array(
					'class' => 'checkbox-inline',
					'label' => $label,
					'between' => null,
					'after' => null,
				);
			} else {
				$opts = array(
					'class' => $className,
					'label' => $label,
					'between' => '<div class="clearfix">',
					'after' => '</div>',
				);
			}			
			
			$options = array_merge($options, $opts);
		}
		
		return parent::input($fieldName, $options);
	}
}