<?php
App::uses('SigDatum', 'Model');

/**
 * SigDatum Test Case
 *
 */
class SigDatumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sig_datum',
		'app.question',
		'app.answer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SigDatum = ClassRegistry::init('SigDatum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SigDatum);

		parent::tearDown();
	}

}
