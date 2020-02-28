<?php
/**
 * Test_Widgets class for Widgets class of the theme.
 *
 * @author  Kiran Potphode <kiran.potphode@rtcamp.com>
 *
 * @package Blank_Theme
 */

namespace BLANK_THEME\Tests;

use BLANK_THEME\Inc\Widgets;

/**
 * Class Test_Customizer
 *
 * @coversDefaultClass \BLANK_THEME\Inc\Widgets
 */
class Test_Widgets extends \WP_UnitTestCase {
	/**
	 * This Assets data member will contain Assets class object.
	 *
	 * @var BLANK_THEME\Inc\Widgets
	 */
	protected $instance = false;

	/**
	 * This function activate the theme.
	 *
	 * @return void
	 */
	public function setUp(): void {

		parent::setUp();
		switch_theme( 'blank-theme' );
		$this->instance = Widgets::get_instance();
	}

	/**
	 * Test constructor function.
	 *
	 * @covers ::__construct
	 */
	public function test_construct() {
		$this->assertInstanceOf( 'BLANK_THEME\Inc\Widgets', $this->instance );
	}

	/**
	 * Function to test hooks setup.
	 *
	 * @covers ::_setup_hooks
	 */
	public function test_setup_hooks() {
		$this->assertEquals( 10, has_action( 'widgets_init', array( $this->instance, 'register_widgets' ) ) );
	}
}
