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

/**
 * Description
 *
 * @author Ingo Pfennigstorf
 * @date 29.06.11
 **/
class Tx_IpIssuu_IndexControllerTest extends Tx_Extbase_Tests_Unit_BaseTestCase
{

	/**
	 * @var Tx_Phpunit_Framework
	 */
	private $testingFramework;

	/**
	 * @test
	 * @return void
	 */
	public function checkeIfControllerIsToll()
	{
		$olaf = 1;
		$this->assertEquals($olaf, 1);
	}

	public function setUp()
	{
		$this->testingFramework = new Tx_Phpunit_Framework('tx_ipissuu');

	}

	public function tearDown()
	{
		$this->testingFramework->cleanUp();

		unset($this->fixture, $this->testingFramework);
	}
}

?>