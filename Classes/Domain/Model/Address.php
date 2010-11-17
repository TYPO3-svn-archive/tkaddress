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
 * Address Model
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Tx_Tkaddress_Domain_Model_Address extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 * @var string
	 */
	protected $name;
	/**
	 * gender
	 * @var string
	 */
	protected $gender;
	/**
	 * firstName
	 * @var string
	 */
	protected $firstName;
	/**
	 * middleName
	 * @var string
	 */
	protected $middleName;
	/**
	 * lastName
	 * @var string
	 */
	protected $lastName;
	/**
	 * birthday
	 * @var DateTime
	 */
	protected $birthday;
	/**
	 * title
	 * @var string
	 */
	protected $title;
	/**
	 * email
	 * @var string
	 */
	protected $email;
	/**
	 * phone
	 * @var string
	 */
	protected $phone;
	/**
	 * mobile
	 * @var string
	 */
	protected $mobile;
	/**
	 * www
	 * @var string
	 */
	protected $www;
	/**
	 * address
	 * @var string
	 */
	protected $address;
	/**
	 * building
	 * @var string
	 */
	protected $building;
	/**
	 * room
	 * @var string
	 */
	protected $room;
	/**
	 * company
	 * @var string
	 */
	protected $company;
	/**
	 * city
	 * @var string
	 */
	protected $city;
	/**
	 * zip
	 * @var string
	 */
	protected $zip;
	/**
	 * region
	 * @var string
	 */
	protected $region;
	/**
	 * country
	 * @var string
	 */
	protected $country;
	/**
	 * image
	 * @var string
	 */
	protected $image;
	/**
	 * fax
	 * @var string
	 */
	protected $fax;
	/**
	 * description
	 * @var string
	 */
	protected $description;
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Tkaddress_Domain_Model_AddressGroup> The FeUser Groups
	 */
	protected $addressgroup;

	/**
	 * Constructor. Initializes all Tx_Extbase_Persistence_ObjectStorage instances.
	 */
	public function __construct() {
		$this->setAddressgroup(new Tx_Extbase_Persistence_ObjectStorage);
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $this->getFirstName() . ' ' . $this->getLastName();
	}

	public function getGender() {
		return $this->gender;
	}

	public function setGender($gender) {
		$this->gender = $gender;
	}

	public function getFirstName() {
		return $this->firstName;
	}

	public function setFirstName($firstName = NULL) {
		$this->firstName = $firstName;
	}

	public function getMiddleName() {
		return $this->middleName;
	}

	public function setMiddleName($middleName = NULL) {
		$this->middleName = $middleName;
	}

	public function getLastName() {
		return $this->lastName;
	}

	public function setLastName($lastName = NULL) {
		$this->lastName = $lastName;
	}

	public function getBirthday() {
		return $this->birthday;
	}

	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title = NULL) {
		$this->title = $title;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public function getPhone() {
		return $this->phone;
	}

	public function setPhone($phone) {
		$this->phone = $phone;
	}

	public function getMobile() {
		return $this->mobile;
	}

	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	public function getWww() {
		return $this->www;
	}

	public function setWww($www) {
		$this->www = $www;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setAddress($address) {
		$this->address = $address;
	}

	public function getBuilding() {
		return $this->building;
	}

	public function setBuilding($building) {
		$this->building = $building;
	}

	public function getRoom() {
		return $this->room;
	}

	public function setRoom($room) {
		$this->room = $room;
	}

	public function getCompany() {
		return $this->company;
	}

	public function setCompany($company) {
		$this->company = $company;
	}

	public function getCity() {
		return $this->city;
	}

	public function setCity($city) {
		$this->city = $city;
	}

	public function getZip() {
		return $this->zip;
	}

	public function setZip($zip) {
		$this->zip = $zip;
	}

	public function getRegion() {
		return $this->region;
	}

	public function setRegion($region) {
		$this->region = $region;
	}

	public function getCountry() {
		return $this->country;
	}

	public function setCountry($country) {
		$this->country = $country;
	}

	public function getImage() {
		return explode(',', $this->image);
	}

	public function setImage($image) {
		$this->image = $image;
	}

	public function addImage($image) {
		$imgArr = array();
		if (strlen($this->image) > 0) {
			$imgArr = explode(',', $this->image);
		}
		$imgArr[] = $image;
		$this->image = implode(',', $imgArr);
	}

	public function getFax() {
		return $this->fax;
	}

	public function setFax($fax) {
		$this->fax = $fax;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Set Groups for Feuser
	 * 
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Tkaddress_Domain_Model_AddressGroup> $addressgroup 
	 */
	public function setAddressgroup(Tx_Extbase_Persistence_ObjectStorage $addressgroup) {
		$this->addressgroup = $addressgroup;
	}

	/**
	 * Returns the Group of the Feuser
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Tkaddress_Domain_Model_AddressGroup> The regions of the offer
	 */
	public function getAddressgroup() {
		return clone $this->addressgroup;
	}

	/**
	 * Adds a group to the addressgroup
	 *
	 * @param Tx_Tkaddress_Domain_Model_AddressGroup The group to be added
	 * @return void
	 */
	public function addGroups(Tx_Tkaddress_Domain_Model_AddressGroup $group) {
		$this->addressgroup->attach($group);
	}

	/**
	 * remove a group to the addressgroup
	 *
	 * @param Tx_Tkaddress_Domain_Model_AddressGroup The group to be added
	 * @return void
	 */
	public function removeGroups(Tx_Tkaddress_Domain_Model_AddressGroup $group) {
		$this->addressgroup->detach($group);
	}

}

?>