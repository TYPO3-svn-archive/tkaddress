<?php

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Thomas Kieslich <thomaskieslich@gmx.net>
 *
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
 * ************************************************************* */

/**
 * Test for AddressControllerTest
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Tkaddress_Controller_AddressControllerTest extends Tx_Extbase_BaseTestCase {

	/**
	 * @test
	 */
	public function indexActionWorks() {
		$mockAddressRepository = $this->getMock('Tx_Tkaddress_Domain_Repository_AddressRepository', array('findAll'), array(), '', FALSE);
		$mockAddressRepository->expects($this->once())->method('findAll')->will($this->returnValue(array('address1', 'address2')));

		$mockView = $this->getMock('Tx_Fluid_Core_View_TemplateView', array('assign'), array(), '', FALSE);
		$mockView->expects($this->once())->method('assign')->with('addresses', array('address1', 'address2'));

		$mockController = $this->getMock($this->buildAccessibleProxy('Tx_Tkaddress_Controller_AddressController'), array('dummy'), array(), '', FALSE);
		$mockController->_set('addressRepository', $mockAddressRepository);
		$mockController->_set('view', $mockView);
		$mockController->indexAction();
	}
}
?>
