<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "autoloader".
 *
 * Auto generated 17-08-2022 11:24
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Autoloader',
  'description' => 'Automatic components loading of ExtBase extensions to get more time for coffee in the company ;) This ext is not a PHP SPL autoloader or class loader - it is better! Loads CommandController, Xclass, Hooks, FlexForms, Slots, TypoScript, TypeConverter, BackendLayouts and take care of createing needed templates, TCA configuration or translations at the right location.',
  'category' => NULL,
  'version' => '7.3.6',
  'state' => 'stable',
  'uploadfolder' => true,
  'clearcacheonload' => false,
  'author' => 'Tim Lochmüller',
  'author_email' => 'tim.lochmueller@hdnet.de',
  'author_company' => 'hdnet.de',
  'constraints' => 
  array (
    'depends' => 
    array (
      'php' => '7.3.0-8.99.99',
      'typo3' => '10.4.6-11.5.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

