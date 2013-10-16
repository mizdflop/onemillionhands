<?php
App::uses('Trend', 'Model');

/**
 * Trend Test Case
 *
 */
class TrendTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trend',
		'app.player',
		'app.analysis',
		'app.analysis_type',
		'app.analyses_player',
		'app.analyses_trend'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Trend = ClassRegistry::init('Trend');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trend);

		parent::tearDown();
	}

}
