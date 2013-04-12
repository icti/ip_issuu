<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Ingo Pfennigstorf <i.pfennigstorf@gmail.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class Tx_IpIssuu_Controller_IndexController extends Tx_Extbase_MVC_Controller_ActionController{

	/**
	 * current hostname
	 *
	 * @var string
	 */
	protected $hostname;

	/**
	 * @var Tx_IpIssuu_Domain_Model_Flip
	 */
	public $flip;

	public function initializeAction(){
		$this->hostname = t3lib_div::getIndpEnv('TYPO3_HOST_ONLY');
	}

	/**
	 * DI method to gain access to a flip model and its methods
	 *
	 * @param Tx_IpIssuu_Domain_Model_Flip $flip
	 * @return void
	 */
	public function injectFlip(Tx_IpIssuu_Domain_Model_Flip $flip){
		$this->flip = $flip;
	}

	/**
	 * Index Action that reads the settings and generates Javascript data to put it into the header of the site
	 *
	 * @return void
	 */
	public function indexAction(){

			// Code from Flexform
		$this->view->assign('code', $this->settings['jCode']);
  }


  /**
	 * Parsing the provided Joomla Code and writes the excerpts to local variables
	 *
	 * @throws Exception
	 * @param  string $embedCode
	 * @return void
	 */
  public function parseJoomlaCode($embedCode){
    try {
      $this->parseJoomlaCodeV2($embedCode);
    } catch(Exception $e){
      $this->parseJoomlaCodeV1($embedCode);
    }
  }

	/**
	 * Parsing the provided Joomla Code and writes the excerpts to local variables
	 *
	 * @throws Exception
	 * @param  string $embedCode
	 * @return void
	 */
	protected function parseJoomlaCodeV1($embedCode){

				// this expression should be matched as of today (2011-06-26)
			$regex = "/\[issuu layout=(.*) showflipbtn=(true|false) documentid=([a-f0-9-]*) docname=(.*) loadinginfotext=(.*) showhtmllink=(true|false) tag=(.*) width=([0-9]*) height=([0-9]*) unit=(.*)\]/";

		if (preg_match($regex, $embedCode, $results)){

				// Putting results into Class variables
			$this->flip->setLayout($results[1]);

			$this->flip->setShowflipbtn($results[2]);

			$this->flip->setDocumentid($results[3]);

			$this->flip->setDocname($results[4]);

			$this->flip->setLoadinginfotext($results[5]);

			$this->flip->setShowhtmllink($results[6]);

			$this->flip->setWidth($results[8]);

			$this->flip->setHeight($results[9]);

			$this->flip->setUnit($results[10]);

		} else {
			throw new Exception("Wrong embeddingcode. Please visit www.issuu.com for details on the code", 1309094974);
		}

  }

  	/**
	 * Parsing the provided Joomla Code and writes the excerpts to local variables
	 *
	 * @throws Exception
	 * @param  string $embedCode
	 * @return void
	 */
	protected function parseJoomlaCodeV2($embedCode){


    if(preg_match('/\[issuu ([^]]*)\]/i', $embedCode, $matches)){
      $issuuValues = $matches[1];
    } else {
      throw new Exception("Wrong embeddingcode. Please visit www.issuu.com for details on the code", 1309094974);
    }

    $this->flip->setWidth($this->getValueWithDefault('/(?:^|[\s]+)width=([\S]*)/i', $issuuValues, 450));
    $this->flip->setHeight($this->getValueWithDefault('/(?:^|[\s]+)height=([\S]*)/i', $issuuValues, 301));
    $this->flip->setDocumentid($this->getValueWithDefault('/(?:^|[\s]+)documentId=([\S]*)/i', $issuuValues, ''));
    $this->flip->setDocname($this->getValueWithDefault('/(?:^|[\s]+)docName=([\S]*)/i', $issuuValues, ''));
    $this->flip->setUnit('px');
    $this->flip->setLayout($this->getValueWithDefault('/(?:^|[\s]+)layout=([\S]*)/i', $issuuValues, ''));


	}
	/**
	 * Experimental Use of wmode = transparent
	 * 
	 * @return string
	 */
	protected function getTransparentMode(){

		$this->flip->getFlashTransparent === 1 ? $wmode = 'wmode: \'transparent\',' : $wmode = '';

		return $wmode;
  }


  protected function getValueWithDefault($regex, $params, $default){
    $matchCount = preg_match_all($regex, $params, $matches);
    if ($matchCount) {
      return $matches[1][0];
    } else {
      return $default;
    }
  }
}
