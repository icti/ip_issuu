<?php

########################################################################
# Extension Manager/Repository config file for ext "ip_issuu".
#
# Auto generated 12-09-2012 10:52
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'issuu Flash PDFs',
	'description' => 'Flip through your pdfs using issuu.com',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '0.1.2',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Ingo Pfennigstorf',
	'author_email' => 'i.pfennigstorf@gmail.com',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'typo3' => '4.5.0-4.6.99',
			'extbase' => '',
			'fluid' => '',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:12:{s:9:"ChangeLog";s:4:"ef8e";s:10:"README.txt";s:4:"c394";s:16:"ext_autoload.php";s:4:"c375";s:12:"ext_icon.gif";s:4:"2f2c";s:17:"ext_localconf.php";s:4:"b40c";s:14:"ext_tables.php";s:4:"f707";s:28:"Classes/Controller/Index.php";s:4:"f96c";s:29:"Classes/Domain/Model/Flip.php";s:4:"ccfa";s:42:"Configuration/Flexform/flexform_ds_pi1.xml";s:4:"50c4";s:44:"Resources/Private/Templates/Index/Index.html";s:4:"f590";s:56:"Tests/Unit/Controller/Tx_IpIssuu_IndexControllerTest.php";s:4:"14d3";s:14:"doc/manual.sxw";s:4:"cc83";}',
);

?>