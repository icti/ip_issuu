<?php

class Tx_IpIssuu_ViewHelpers_Widget_IssuuViewHelper extends Tx_Fluid_Core_Widget_AbstractWidgetViewHelper {

	/**
	 * @var Tx_IpIssuu_ViewHelpers_Widget_Controller_IssuuController
	 */
	protected $controller;

	/**
	 * @param Tx_IpIssuu_ViewHelpers_Widget_Controller_IssuuController $controller
	 * @return void
	 */
	public function injectController(Tx_IpIssuu_ViewHelpers_Widget_Controller_IssuuController $controller) {
		$this->controller = $controller;
	}

	/**
	 *
	 * @param string $code
	 * @param string $width
	 * @param string $height
	 * @return type 
	 */
	public function render($code, $width = null, $height = null) {
		return $this->initiateSubRequest();
	}

}

?>
