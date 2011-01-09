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
 * Controller for the Address object
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Tkaddress_Controller_AddressController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * address Repository
	 */
	protected $addressRepository;
	/**
	 * addressGroup Repository
	 */
	protected $addressGroupRepository;
	/**
	 * the admins
	 */
	protected $isAdmin;

	/**
	 * Initializes the current action
	 *
	 * @return	void
	 */
	public function initializeAction() {
		$this->addressRepository = t3lib_div::makeInstance('Tx_Tkaddress_Domain_Repository_AddressRepository');
		$this->addressGroupRepository = t3lib_div::makeInstance('Tx_Tkaddress_Domain_Repository_AddressGroupRepository');

		//test admin is logged in
		$this->isAdmin = Tx_Tkaddress_Service_AccessControllService::isLoggedIn($this->settings['admin']['feuser']);
	}

	/**
	 * address list
	 * @param string $type
	 * @param string $direction
	 */
	public function listAction($type = 'name', $direction = 0) {
		//get data
		$addresses = $this->addressRepository->sortBy($type, $direction);
		$pagerConfig = array(
			'itemsPerPage' => $this->settings['itemsPerPage'],
			'insertAbove' => $this->settings['pagerEnabled'],
			'insertBelow' => 0
		);

		$this->view->assign('addresses', $addresses);
		$fields = explode(',', $this->settings['list']['fields']);
		$this->view->assign('fields', $fields);
		$this->view->assign('type', $type);
		$this->view->assign('direction', $direction);
		$this->view->assign('pagerConfig', $pagerConfig);
		$this->view->assign('isAdmin', $this->isAdmin);
	}

	/**
	 * Single View
	 * @param Tx_Tkaddress_Domain_Model_Address $address 
	 * @param int $page
	 */
	public function singleAction(Tx_Tkaddress_Domain_Model_Address $address, $page = 1) {
		$this->view->assign('address', $this->addressRepository->findByUid($address));
		$fields = explode(',', $this->settings['single']['fields']);
		$this->view->assign('fields', $fields);
		$this->view->assign('page', $page);
	}

	/**
	 * Search address
	 * @param string $searchPhrase
	 * @param int $page
	 */
	public function searchAction($searchPhrase, $page = 1) {
		$fields = explode(',', $this->settings['list']['fields']);
		$this->view->assign('fields', $fields);
		$this->view->assign('page', $page);
		$searchFields = explode(',', $this->settings['search']['fields']);
		$addresses = $this->addressRepository->searchFor($searchFields, $searchPhrase);
		$this->view->assign('addresses', $addresses);
		$this->view->assign('searchPhrase', $searchPhrase);
		$this->view->assign('isAdmin', $this->isAdmin);
	}

	/**
	 * new address
	 *
	 * @param	[type]		$Tx_Tkaddress_Domain_Model_Address $newAddress: ...
	 * @param int $page
	 * @return	string		The rendered list action
	 */
	public function newAction(Tx_Tkaddress_Domain_Model_Address $newAddress = NULL, $page = 1) {
		if ($this->isAdmin) {
			$this->view->assign('groups', $this->addressGroupRepository->findAll());
			$fields = explode(',', $this->settings['single']['fields']);
			$this->view->assign('fields', $fields);
			$imgArr = array();
			$newImages = $this->settings['maxImages'];
			if ($newImages > 0) {
				for ($i = 0; $i < $newImages; $i++) {
					$imgArr[] = '';
				}
			}
			$this->view->assign('newImages', $imgArr);
			$this->view->assign('page', $page);
		} else {
			$this->flashMessageContainer->add(Tx_Extbase_Utility_Localization::translate('notice_notAdmin', $this->extensionName));
			$this->redirect('list', 'Address', NULL, array('page' => $page));
		}
	}

	/**
	 * create address
	 *
	 * @param	[type]		$Tx_Tkaddress_Domain_Model_Address $newAddress: ...
	 * @param int $page
	 * @return	string		The rendered create action
	 */
	public function createAction(Tx_Tkaddress_Domain_Model_Address $newAddress, $page = 1) {
		if ($this->isAdmin) {
			//set Images
			if ($_FILES) {
				for ($i = 0; $i < count($_FILES['tx_tkaddress_pi1']['name']['newImage']); $i++) {
					$file = array();
					$file['name'] = $_FILES['tx_tkaddress_pi1']['name']['newImage'][$i];
					$file['type'] = $_FILES['tx_tkaddress_pi1']['type']['newImage'][$i];
					$file['tmp_name'] = $_FILES['tx_tkaddress_pi1']['tmp_name']['newImage'][$i];
					$file['size'] = $_FILES['tx_tkaddress_pi1']['size']['newImage'][$i];
					if ($file['name']) {
						$image = Tx_Tkaddress_Service_FileService::uploadFile($file['name'], $file['type'], $file['tmp_name'], $file['size'], $this->settings);
						if ($image) {
							$newAddress->addImage($image);
						}
					}
				}
			}

			$newAddress->setName();
			$this->addressRepository->add($newAddress);
		} else {
			$this->flashMessageContainer->add(Tx_Extbase_Utility_Localization::translate('notice_notAdmin', $this->extensionName));
		}
//		$this->redirect('list', 'Address', NULL, array('page' => $page));
	}

	/**
	 * edit address
	 *
	 * @param	[type]		$Tx_Tkaddress_Domain_Model_Address $address: ...
	 * @return	string		The rendered edit action
	 * @param int $page
	 */
	public function editAction(Tx_Tkaddress_Domain_Model_Address $address, $page = 1) {
		if ($this->isAdmin) {
			$this->view->assign('address', $address);
			$this->view->assign('groups', $this->addressGroupRepository->findAll());
			$fields = explode(',', $this->settings['single']['fields']);
			$this->view->assign('fields', $fields);
			$image = $address->getImage();
			$newImages = 0;
			if ($image[0] == '') {
				$newImages = $this->settings['maxImages'];
			} else {
				$newImages = $this->settings['maxImages'] - count($address->getImage());
			}
			$imgArr = array();
			if ($newImages > 0) {
				for ($i = 0; $i < $newImages; $i++) {
					$imgArr[] = '';
				}
			}
			$this->view->assign('newImages', $imgArr);
			$this->view->assign('settings', $this->settings);
			$this->view->assign('page', $page);
		} else {
			$this->flashMessageContainer->add(Tx_Extbase_Utility_Localization::translate('notice_notAdmin', $this->extensionName));
			$this->redirect('list', 'Address', NULL, array('page' => $page));
		}
	}

	/**
	 * update address
	 *
	 * @param	[type]		$Tx_Tkaddress_Domain_Model_Address $updatedAddress: ...
	 * @return	string		The rendered edit action
	 * @param int $page
	 */
	public function updateAction(Tx_Tkaddress_Domain_Model_Address $updatedAddress, $page = 1) {
		if ($this->isAdmin) {
			//remove Images
			$imgRemove = $_POST['tx_tkaddress_pi1']['removeImage'];
			$images = $updatedAddress->getImage();
			for ($r = 0; $r <= count($imgRemove); $r++) {
				if (strlen($imgRemove[$r]) > 0) {
					$imageDeleted = Tx_Tkaddress_Service_FileService::deleteFile($images[$r], $this->settings);
					unset($images[$imgRemove[$r]]);
				}
			}
			$updatedAddress->setImage(implode(',', $images));

			//set Images
			if ($_FILES) {
				for ($i = 0; $i < count($_FILES['tx_tkaddress_pi1']['name']['newImage']); $i++) {
					$file = array();
					$file['name'] = $_FILES['tx_tkaddress_pi1']['name']['newImage'][$i];
					$file['type'] = $_FILES['tx_tkaddress_pi1']['type']['newImage'][$i];
					$file['tmp_name'] = $_FILES['tx_tkaddress_pi1']['tmp_name']['newImage'][$i];
					$file['size'] = $_FILES['tx_tkaddress_pi1']['size']['newImage'][$i];
					if ($file['name']) {
						$image = Tx_Tkaddress_Service_FileService::uploadFile($file['name'], $file['type'], $file['tmp_name'], $file['size'], $this->settings);
						var_dump($image);
						if ($image) {
							$updatedAddress->addImage($image);
						}
					}
				}
			}

			$error = new Tx_Extbase_MVC_Controller_ArgumentError('Wrong filesize!', 1284476850);
			$this->argumentsMappingResults->addError($error, 'tkaddress');


			$updatedAddress->setName();
			$post = t3lib_div::_POST();
			$post = $post['tx_tkaddress_pi1']['updatedAddress'];

			if (!$post['birthday']) {
				$updatedAddress->setBirthday(NULL);
			}

			$this->addressRepository->update($updatedAddress);
			$this->redirect('list', 'Address', NULL, array('page' => $page));
		} else {
			$this->flashMessageContainer->add(Tx_Extbase_Utility_Localization::translate('notice_notAdmin', $this->extensionName));
			$this->redirect('list', 'Address', NULL, array('page' => $page));
		}
	}

	/**
	 * delete address
	 *
	 * @param	[type]		$Tx_Tkaddress_Domain_Model_Address $address: ...
	 * @return	string		The rendered edit action
	 * @param int $page
	 */
	public function deleteAction(Tx_Tkaddress_Domain_Model_Address $address, $page = 1) {
		if ($this->isAdmin) {
			$this->view->assign('address', $this->addressRepository->findByUid($address));
			$fields = explode(',', $this->settings['single']['fields']);
			$this->view->assign('fields', $fields);
			$this->view->assign('page', $page);
			if ($this->request->hasArgument('reallyDelete')) {
				$this->addressRepository->remove($address);
				$this->redirect('list', 'Address', NULL, array('page' => $page));
			}
		} else {
			$this->flashMessageContainer->add(Tx_Extbase_Utility_Localization::translate('notice_notAdmin', $this->extensionName));
			$this->redirect('list', 'Address', NULL, array('page' => $page));
		}
	}

}

?>
