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
 * FlexformFields Service
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class tx_Tkaddress_Service_FlexformFieldsService {

	var $notAllowedFields = array(
		'uid',
		'pid',
		'hidden',
		'tstamp',
		'deleted'
	);

	public function addAddressFields($config, &$pObj) {
		$optionList = array();
		$res = mysql_query('SHOW COLUMNS FROM tt_address');
//		$res = $GLOBALS['TYPO3_DB']->admin_get_fields('tt_address');
		if ($res) {
			while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {

				if ($row['Field'] && !in_array($row['Field'], $this->notAllowedFields)) {
					$curName = ($pObj->sL('LLL:EXT:tt_address/locallang_tca.xml:tt_address.' . $row['Field']) ?
									$pObj->sL('LLL:EXT:tt_address/locallang_tca.xml:tt_address.' . $row['Field']) :
									$pObj->sL('LLL:EXT:lang/locallang_general.xml:LGL.' . $row['Field']));

					if (!$curName)
						$curName = '"' . $row['Field'] . '"';
					$curName = str_replace(':', '', $curName);
					$optionList[] = array(0 => $curName,
						1 => t3lib_div::underscoredToLowerCamelCase($row['Field']));
				}
			}
		}
		$config['items'] = array_merge($config['items'], $optionList);
		return $config;
	}

}

?>
