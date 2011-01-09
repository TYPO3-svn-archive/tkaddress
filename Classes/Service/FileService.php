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
 * File Services
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Tkaddress_Service_FileService {

	public function uploadFile($name, $type, $temp, $size, $settings) {
		$returnValue = "";

		$extAllowed = self::extAllowed($name, $settings);
		$mimeAllowed = self::mimeAllowed($type, $settings);
		$sizeAllowed = self::sizeAllowed($size, $settings);

		if ($size > 0) {
			$fileFunc = t3lib_div::makeInstance('t3lib_basicFileFunctions');


			$name = $fileFunc->cleanFileName($name);
			$uploadPath = $fileFunc->cleanDirectoryName(PATH_site . $settings['uploadPath']);
			$uniqueFileName = $fileFunc->getUniqueName($name, $uploadPath);
			$fileStored = move_uploaded_file($temp, $uniqueFileName);

//			$returnValue = basename($uniqueFileName);
			$returnValue = $sizeAllowed;
		}

		return $returnValue;
	}

	public function deleteFile($name, $settings) {
		$fileFunc = t3lib_div::makeInstance('t3lib_basicFileFunctions');
		$fileDeleted = unlink($fileFunc->cleanDirectoryName(PATH_site . $settings['uploadPath'] . $name));
		return $fileDeleted;
	}

	protected function mimeAllowed($mime, $settings) {
		if (!$settings['fileMime'])
			return TRUE;   //all mimetypes allowed
		$includelist = explode(",", $settings['fileMime']);
		return ( (in_array($mime, $includelist) || in_array('*', $includelist)) );
	}

	protected function extAllowed($name, $settings) {
		if (!$settings['fileExtensions'])
			return TRUE;   //all mimetypes allowed
		$includelist = explode(",", $settings['fileExtensions']);
		$extension = '';
		if ($extension = strstr($name, '.')) {
			$extension = substr($extension, 1);
			return ((in_array($extension, $includelist) || in_array('*', $includelist)));
		} else {
			return FALSE;
		}
	}

	protected function sizeAllowed($size, $settings) {
		return $size < (int) $settings['fileSize'];
	}

}

?>
