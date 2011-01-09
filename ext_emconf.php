<?php

########################################################################
# Extension Manager/Repository config file for ext "tkaddress".
#
# Auto generated 09-01-2011 17:19
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
	'dependencies' => 'tt_address,extbase,fluid',
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
	'version' => '0.3.1',
	'constraints' => array(
		'depends' => array(
			'tt_address' => '2.2.1-0.0.0',
			'typo3' => '4.5.0-0.0.0',
			'extbase' => '1.3.0-0.0.0',
			'fluid' => '1.3.0-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'suggests' => array(
	),
	'_md5_values_when_last_written' => 'a:44:{s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"a605";s:14:"ext_tables.php";s:4:"0288";s:12:"t3jquery.txt";s:4:"283d";s:40:"Classes/Controller/AddressController.php";s:4:"bc42";s:32:"Classes/Domain/Model/Address.php";s:4:"dab9";s:37:"Classes/Domain/Model/AddressGroup.php";s:4:"c211";s:52:"Classes/Domain/Repository/AddressGroupRepository.php";s:4:"e5ab";s:47:"Classes/Domain/Repository/AddressRepository.php";s:4:"c39f";s:41:"Classes/Service/AccessControllService.php";s:4:"156e";s:31:"Classes/Service/FileService.php";s:4:"01d0";s:41:"Classes/Service/FlexformFieldsService.php";s:4:"e09f";s:40:"Classes/ViewHelpers/GenderViewHelper.php";s:4:"56ec";s:42:"Classes/ViewHelpers/PropertyViewHelper.php";s:4:"e148";s:38:"Classes/ViewHelpers/TypeViewHelper.php";s:4:"c651";s:36:"Configuration/FlexForms/flexform.xml";s:4:"086c";s:34:"Configuration/TypoScript/setup.txt";s:4:"b068";s:28:"Resources/Private/_.htaccess";s:4:"2d3d";s:40:"Resources/Private/Language/locallang.xml";s:4:"d37d";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"d598";s:38:"Resources/Private/Layouts/default.html";s:4:"7fa7";s:41:"Resources/Private/Partials/EditLinks.html";s:4:"e3c8";s:42:"Resources/Private/Partials/formErrors.html";s:4:"1378";s:47:"Resources/Private/Templates/Address/Delete.html";s:4:"92d5";s:45:"Resources/Private/Templates/Address/Edit.html";s:4:"ec10";s:45:"Resources/Private/Templates/Address/List.html";s:4:"cd87";s:44:"Resources/Private/Templates/Address/New.html";s:4:"b95e";s:47:"Resources/Private/Templates/Address/Search.html";s:4:"04c5";s:47:"Resources/Private/Templates/Address/Single.html";s:4:"69aa";s:34:"Resources/Public/CSS/extension.css";s:4:"021a";s:43:"Resources/Public/CSS/images/signSorting.png";s:4:"cacd";s:43:"Resources/Public/CSS/images/signSorting.svg";s:4:"1e63";s:41:"Resources/Public/CSS/images/signsEdit.png";s:4:"4b4e";s:41:"Resources/Public/CSS/images/signsEdit.svg";s:4:"cab8";s:38:"Resources/Public/CSS/images/submit.png";s:4:"9caa";s:38:"Resources/Public/CSS/images/submit.svg";s:4:"7c51";s:37:"Resources/Public/Icons/datepicker.gif";s:4:"0b80";s:64:"Resources/Public/Icons/tx_tkaddressedit_domain_model_address.gif";s:4:"1103";s:35:"Resources/Public/Images/default.png";s:4:"3ba2";s:35:"Resources/Public/Images/default.svg";s:4:"917f";s:32:"Resources/Public/JS/extension.js";s:4:"6c0d";s:42:"Tests/Controller/AddressControllerTest.php";s:4:"c190";s:34:"Tests/Domain/Model/AddressTest.php";s:4:"3608";s:14:"doc/manual.sxw";s:4:"885e";}',
);

?>