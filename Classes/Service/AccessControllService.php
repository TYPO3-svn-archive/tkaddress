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
 * AccessControll Service
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Tkaddress_Service_AccessControllService implements t3lib_Singleton {

	public function isLoggedIn($admins = NULL) {
		$isAdmin = FALSE;
		foreach (explode(',', $admins) as $uid) {
			if ((int) $uid === self::getFrontendUserUid()) {
				$isAdmin = TRUE;
			}
		}
		return $isAdmin;
	}

	public function hasLoggedInFrontendUser() {
		return $GLOBALS['TSFE']->loginUser === 1 ? TRUE : FALSE;
	}

	public function getFrontendUserUid() {
		if (self::hasLoggedInFrontendUser() && !empty($GLOBALS['TSFE']->fe_user->user['uid'])) {
			return intval($GLOBALS['TSFE']->fe_user->user['uid']);
		}
		return NULL;
	}

}

?>
