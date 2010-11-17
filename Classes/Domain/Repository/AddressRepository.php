<?php

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
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
 * Address repository
 *
 * @package Extbase
 * @subpackage Domain\Repository
 * @version $Id$
 */
class Tx_Tkaddress_Domain_Repository_AddressRepository extends Tx_Extbase_Persistence_Repository {

	public function sortByPager($type, $direction, &$page = 1, $itemsPerPage = 10, &$pageCount = 1) {
		$query = $this->createQuery();

		if ($direction == 0) {
			$query->setOrderings(
					array(
						$type => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING
					)
			);
		} else if ($direction == 1) {
			$query->setOrderings(
					array(
						$type => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING
					)
			);
		}

		$pageCount = Tx_ExtbasePager_Utility_Pager::prepareQuery($query, $page, $itemsPerPage);


		return $query->execute();
	}

	public function sortBy($type, $direction) {
		$query = $this->createQuery();
		if ($direction == 0) {
			$query->setOrderings(
					array(
						$type => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING
					)
			);
		} else if ($direction == 1) {
			$query->setOrderings(
					array(
						$type => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING
					)
			);
		}

		return $query->execute();
	}

	public function searchFor($searchFields, $searchQuery) {
		$query = $this->createQuery();
		$constraint = array();
		foreach ($searchFields as $field) {
			$constraint[] = $query->like($field, '%' . $searchQuery . '%');
		}
		$query = $query->matching(
						$query->logicalOr(
								$constraint
						)
		);
		$query->setLimit(60);

		$query->setOrderings(array('lastName' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING));
		return $query->execute();
	}

}

?>