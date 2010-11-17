<?php

########################################################################
# Extension Manager/Repository config file for ext "tkaddress".
#
# Auto generated 17-11-2010 17:52
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'FE Address edit',
	'description' => 'Edit Addresses from tt_address in Frontend. Works with extbase/fluid.',
	'category' => 'plugin',
	'author' => 'Thomas Kieslich',
	'author_email' => 'thomaskieslich@gmx.net',
	'author_company' => '',
	'shy' => '',
	'dependencies' => 'tt_address,extbase,extbase_pager,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.3.0',
	'constraints' => array(
		'depends' => array(
			'tt_address' => '2.2.1-0.0.0',
			'typo3' => '4.3.0-0.0.0',
			'extbase' => '1.2.0-0.0.0',
			'extbase_pager' => '',
			'fluid' => '1.2.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:49:{s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"a605";s:14:"ext_tables.php";s:4:"0288";s:12:"t3jquery.txt";s:4:"283d";s:40:"Classes/Controller/AddressController.php";s:4:"c166";s:32:"Classes/Domain/Model/Address.php";s:4:"dab9";s:37:"Classes/Domain/Model/AddressGroup.php";s:4:"c211";s:52:"Classes/Domain/Repository/AddressGroupRepository.php";s:4:"e5ab";s:47:"Classes/Domain/Repository/AddressRepository.php";s:4:"c39f";s:41:"Classes/Service/AccessControllService.php";s:4:"156e";s:31:"Classes/Service/FileService.php";s:4:"e380";s:41:"Classes/Service/FlexformFieldsService.php";s:4:"e09f";s:40:"Classes/ViewHelpers/GenderViewHelper.php";s:4:"56ec";s:42:"Classes/ViewHelpers/PropertyViewHelper.php";s:4:"e148";s:38:"Classes/ViewHelpers/TypeViewHelper.php";s:4:"c651";s:36:"Configuration/FlexForms/flexform.xml";s:4:"086c";s:38:"Configuration/TypoScript/constants.txt";s:4:"ace3";s:34:"Configuration/TypoScript/setup.txt";s:4:"e54f";s:40:"Resources/Private/Language/locallang.xml";s:4:"d37d";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"d598";s:38:"Resources/Private/Layouts/default.html";s:4:"7fa7";s:41:"Resources/Private/Partials/editLinks.html";s:4:"e3c8";s:42:"Resources/Private/Partials/formErrors.html";s:4:"1378";s:47:"Resources/Private/Templates/Address/delete.html";s:4:"92d5";s:45:"Resources/Private/Templates/Address/edit.html";s:4:"0de1";s:45:"Resources/Private/Templates/Address/list.html";s:4:"977c";s:44:"Resources/Private/Templates/Address/new.html";s:4:"36c5";s:47:"Resources/Private/Templates/Address/search.html";s:4:"b705";s:47:"Resources/Private/Templates/Address/single.html";s:4:"69aa";s:34:"Resources/Public/CSS/extension.css";s:4:"bd9e";s:43:"Resources/Public/CSS/images/signSorting.png";s:4:"cacd";s:43:"Resources/Public/CSS/images/signSorting.svg";s:4:"1e63";s:41:"Resources/Public/CSS/images/signsEdit.png";s:4:"4b4e";s:41:"Resources/Public/CSS/images/signsEdit.svg";s:4:"cab8";s:38:"Resources/Public/CSS/images/submit.png";s:4:"9caa";s:38:"Resources/Public/CSS/images/submit.svg";s:4:"7c51";s:37:"Resources/Public/Icons/datepicker.gif";s:4:"0b80";s:64:"Resources/Public/Icons/tx_tkaddressedit_domain_model_address.gif";s:4:"1103";s:35:"Resources/Public/Images/default.png";s:4:"3ba2";s:35:"Resources/Public/Images/default.svg";s:4:"917f";s:32:"Resources/Public/JS/extension.js";s:4:"6c0d";s:42:"Tests/Controller/AddressControllerTest.php";s:4:"c190";s:34:"Tests/Domain/Model/AddressTest.php";s:4:"3608";s:14:"doc/manual.sxw";s:4:"885e";s:28:"nbproject/project.properties";s:4:"bb14";s:21:"nbproject/project.xml";s:4:"6d9c";s:35:"nbproject/private/config.properties";s:4:"d41d";s:36:"nbproject/private/private.properties";s:4:"8fc6";s:29:"nbproject/private/private.xml";s:4:"8db5";}',
);

?>