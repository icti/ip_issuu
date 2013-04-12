<?php


class Tx_IpIssuu_ViewHelpers_Widget_Controller_IssuuController extends Tx_Fluid_Core_Widget_AbstractWidgetController {

	/**
	 * adRepository
	 *
	 * @var Tx_IpIssuu_Controller_IndexController
	 */
	protected $controller;

	/**
	 * injectAdRepository
	 *
	 * @param Tx_IpIssuu_Controller_IndexController $controller
	 * @return void
	 */
	public function injectController(Tx_IpIssuu_Controller_IndexController $controller) {
		$this->controller = $controller;
	}

	/**
	 * action 
	 *
	 * @return void
	 */
	public function indexAction() {


			// Code from Flexform
		$embedCode = 	$this->widgetConfiguration['code'];

		try {
				$this->controller->parseJoomlaCode($embedCode);
		} catch (Exception $e) {
				/* 
 				 * Current (as of april-2013) embed code is pure HTML
 				 * Either a div + JS or an IFrame
 				 * So, we directly render it
 				 *
 				 * TODO: Add further checks to verify the code
 				 */
				return $embedCode;
		}

			// transparent Flash to be properly displayed
		$this->controller->flip->setFlashTransparent = true;

		$width = $this->controller->flip->getWidth().$this->controller->flip->getUnit();
		$height = $this->controller->flip->getHeight().$this->controller->flip->getUnit();

		if($this->widgetConfiguration['width']){
			$width = $this->widgetConfiguration['width'].$this->controller->flip->getUnit();
		}

		if($this->widgetConfiguration['height']){
			$height = $this->widgetConfiguration['height'].$this->controller->flip->getUnit();
		}

		$viewVars = array(
			'issuuWidth' => $width,
			'issuuHeight' => $height,
			'issuId' => $this->controller->flip->getDocumentid()
		);
			// assign to fluid template
		$this->view->assignMultiple($viewVars);    
		
	}  

}
