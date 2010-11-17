<?php

if (!defined('TYPO3_MODE'))
	die('Access denied.');

Tx_Extbase_Utility_Extension::registerPlugin(
				$_EXTKEY, 'Pi1', 'FE Address edit'
);

$TCA['tt_content']['types']['list']['subtypes_excludelist']['tkaddress_pi1'] = 'layout,select_key,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist']['tkaddress_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue('tkaddress_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform.xml');

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'FE Address edit');

if (TYPO3_MODE == 'BE') {
	include_once(t3lib_extMgm::extPath($_EXTKEY) . "Classes/Service/FlexformFieldsService.php");
}
?>