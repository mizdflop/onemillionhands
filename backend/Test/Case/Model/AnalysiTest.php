<?php
App::uses('Analysi', 'Model');

/**
 * Analysi Test Case
 *
 */
class AnalysiTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.analysi'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Analysi = ClassRegistry::init('Analysi');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Analysi);

		parent::tearDown();
	}

}
