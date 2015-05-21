<?php
	/*
	 * Plugin Name: Cosmick Mortgage Calculator
	 * Plugin URI: http://cosmicktechnologies.com/
	 * Description: A simple plugin that adds a simple mortgage calculator widget and shortcode
	 * Version: 1.0
	 * Author: Cosmick Technologies
	 * Author URI: http://cosmicktechnologies.com/
	 * License: GPL2
	 */

	define('MAIN_VERSION', '1.0');

	defined('ABSPATH') or die('No script kiddies please!');

	function cosmick_mortgage_calculator_shortcode($attr) {
		$params = shortcode_atts(array('class' => 'normal'), $attr);

		if ($params['class'] == 'horizontal') {
			$HTML .= '<form class="form-horizontal sfc_calculator" method="post" role="form">';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-sm-3 control-label">Interest Rate</label>';
			$HTML .= '<div class="col-sm-9">';
			$HTML .= '<div class="input-group"><input type="text" class="form-control" name="INTEREST_RATE" required><span class="input-group-addon">%</span></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group pick-length">';
			$HTML .= '<label class="col-sm-3 control-label">Term</label>';
			$HTML .= '<div class="col-sm-9">';
			$HTML .= '<div class="input-group">';
			$HTML .= '<input type="text" class="form-control" name="MONTH_LENGTH" required>';
			$HTML .= '<div class="input-group-btn">';
			$HTML .= '<button type="button" class="btn btn-default dropdown-toggle months" data-toggle="dropdown" style="background-color: #eee; border-color: #ccc; color: #555;">Months <span class="caret"></span></button>';
			$HTML .= '<ul class="dropdown-menu dropdown-menu-right" role="menu">';
			$HTML .= '<li><a href="#" data-input-name="MONTH_LENGTH">Months</a></li>';
			$HTML .= '<li><a href="#" data-input-name="YEAR_LENGTH">Year(s)</a></li>';
			$HTML .= '</ul>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-sm-3 control-label">Loan Amount</label>';
			$HTML .= '<div class="col-sm-9">';
			$HTML .= '<div class="input-group"><span class="input-group-addon">$</span><input type="text" class="form-control" name="PRINCIPAL_AMOUNT" required><span class="input-group-addon">.00</span></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-sm-3 control-label">Down Payment</label>';
			$HTML .= '<div class="col-sm-9">';
			$HTML .= '<div class="input-group"><span class="input-group-addon">$</span><input type="text" class="form-control" name="DOWN_PAYMENT"><span class="input-group-addon">.00</span></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group">';
			$HTML .= '<div class="col-sm-9 col-sm-offset-3">';
			$HTML .= '<button type="submit" class="btn btn-block btn-primary">Submit</button>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<br><br>';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-sm-3 control-label"><h4>Monthly Payment</h4></label>';
			$HTML .= '<div class="col-sm-9">';
			$HTML .= '<div class="input-group input-group-lg monthly-payment"><span class="input-group-addon">$</span><input type="text" class="form-control"></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '</form>';
		} else {
			$HTML .= '<form class="form-horizontal sfc_calculator" method="post" role="form">';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-xs-12 control-label" style="text-align: left!important;">Interest Rate</label>';
			$HTML .= '<div class="col-xs-12">';
			$HTML .= '<div class="input-group"><input type="text" class="form-control" name="INTEREST_RATE" required><span class="input-group-addon">%</span></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group pick-length">';
			$HTML .= '<label class="col-xs-12 control-label" style="text-align: left!important;">Term</label>';
			$HTML .= '<div class="col-xs-12">';
			$HTML .= '<div class="input-group">';
			$HTML .= '<input type="text" class="form-control" name="MONTH_LENGTH" required>';
			$HTML .= '<div class="input-group-btn">';
			$HTML .= '<button type="button" class="btn btn-default dropdown-toggle months" data-toggle="dropdown" style="background-color: #eee; border-color: #ccc; color: #555;">Months <span class="caret"></span></button>';
			$HTML .= '<ul class="dropdown-menu dropdown-menu-right" role="menu">';
			$HTML .= '<li><a href="#" data-input-name="MONTH_LENGTH">Months</a></li>';
			$HTML .= '<li><a href="#" data-input-name="YEAR_LENGTH">Year(s)</a></li>';
			$HTML .= '</ul>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-xs-12 control-label" style="text-align: left!important;">Loan Amount</label>';
			$HTML .= '<div class="col-xs-12">';
			$HTML .= '<div class="input-group"><span class="input-group-addon">$</span><input type="text" class="form-control" name="PRINCIPAL_AMOUNT" required><span class="input-group-addon">.00</span></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-xs-12 control-label" style="text-align: left!important;">Down Payment</label>';
			$HTML .= '<div class="col-xs-12">';
			$HTML .= '<div class="input-group"><span class="input-group-addon">$</span><input type="text" class="form-control" name="DOWN_PAYMENT"><span class="input-group-addon">.00</span></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<div class="form-group" style="margin-bottom: 0;">';
			$HTML .= '<div class="col-xs-12">';
			$HTML .= '<button type="submit" class="btn btn-block btn-default submit">Submit</button>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '<br>';
			$HTML .= '<div class="form-group">';
			$HTML .= '<label class="col-xs-12 control-label" style="text-align: left!important;"><h4>Monthly Payment</h4></label>';
			$HTML .= '<div class="col-xs-12">';
			$HTML .= '<div class="input-group input-group-lg"><span class="input-group-addon">$</span><input type="text" class="form-control" name="MONTHLY_PAYMENT"></div>';
			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '</form>';
		}

		return $HTML;
	}
	add_shortcode('cosmick-mortgage-calculator', 'cosmick_mortgage_calculator_shortcode');

	class cosmick_mortgage_calculator extends WP_Widget {
		public function __construct() {
			parent::WP_Widget(false, 'Mortgage Calculator', 'description=Add a mortgage calculator to your sidebar.');
		}

		public function form($instance) {
			echo('<p>No options as of yet</p>');
		}

		public function update($new_instance, $old_instance) {
			// processes widget options to be saved
		}

		public function widget($args, $instance) {
			echo('<div class="widget">');
			echo('<h3>Mortgage Calculator</h3>');
			echo(do_shortcode('[cosmick-mortgage-calculator]'));
			echo('</div>');
		}
	}
	add_action('widgets_init', create_function('', 'return register_widget("cosmick_mortgage_calculator");'));

	function child_enqueue_scripts() {
		if (!wp_style_is('bootstrap', $list = 'enqueued')) {
			wp_enqueue_style('bootstrap', plugins_url('/css/bootstrap.min.css', __FILE__), FALSE, MAIN_VERSION);
		}

		if (!wp_script_is('bootstrap', $list = 'enqueued')) {
			wp_enqueue_script('bootstrap', plugins_url('/js/bootstrap.min.js', __FILE__), array('jquery'), MAIN_VERSION, TRUE);
		}

		wp_enqueue_script('cosmick_mortgage_calculator-script', plugins_url('/js/script.js', __FILE__), array('jquery', 'bootstrap'), MAIN_VERSION, TRUE);
	}
	add_action('wp_enqueue_scripts', 'child_enqueue_scripts');