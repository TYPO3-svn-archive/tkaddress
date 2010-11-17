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
 * Description of AddressTest
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Tkaddress_Domain_Model_AddressTest extends Tx_Extbase_BaseTestCase {

	/**
	 * @test
	 */
	public function theAddressgroupAreInitializedAsEmptyObjectStorage() {
		$address = new Tx_Tkaddress_Domain_Model_Address();
		$this->assertEquals('Tx_Extbase_Persistence_ObjectStorage', get_class($address->getAddressgroup()));
		$this->assertEquals(0, count($address->getAddressgroup()->toArray()));
	}

	/**
	 * @test
	 */
	public function theAddressgroupCanBeSet() {
		$address = new Tx_Tkaddress_Domain_Model_Address();
		$mockObjectStorage = $this->getMock('Tx_Extbase_Persistence_ObjectStorage', array('contains'), array(), '', FALSE);
		$mockObjectStorage->expects($this->any())->method('contains')->with('foo')->will($this->returnValue(TRUE));
		$address->setAddressgroup($mockObjectStorage);
		$this->assertTrue($address->getAddressgroup()->contains('foo'));
	}
	
	/**
	 * @test
	 */
	public function aGroupCanBeAdded() {
	    $address = new Tx_Tkaddress_Domain_Model_Address();
		$mockGroup = $this->getMock('Tx_Tkaddress_Domain_Model_AddressGroup');
		$address->addGroups($mockGroup);
		$this->assertTrue($address->getAddressgroup()->contains($mockGroup));
	}
	
	/**
	 * @test
	 */
	public function aGroupCanBeRemoved() {
	    $address = new Tx_Tkaddress_Domain_Model_Address();
		$mockGroup = $this->getMock('Tx_Tkaddress_Domain_Model_AddressGroup');
		$address->addGroups($mockGroup);
		$this->assertEquals(1, count($address->getAddressgroup()->toArray()));
		$address->removeGroups($mockGroup);
		$this->assertFalse($address->getAddressgroup()->contains($mockGroup));
	}

}

?>
