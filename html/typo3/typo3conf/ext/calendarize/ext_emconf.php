<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "calendarize".
 *
 * Auto generated 29-08-2022 09:39
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Calendarize - Event Management',
  'description' => 'Create a structure for timely controlled tables (e.g. events) and one plugin for the different output of calendar views (list, detail, month, year, day, week...). The extension is shipped with one default event table, but you can also "calendarize" your own table/model. It is completely independent and configurable! Use your own models as event items in this calender. Development on https://github.com/lochmueller/calendarize',
  'category' => 'fe',
  'version' => '12.4.1',
  'state' => 'stable',
  'uploadfolder' => false,
  'clearcacheonload' => false,
  'author' => 'Tim Lochmüller',
  'author_email' => 'tim@fruit-lab.de',
  'author_company' => NULL,
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '10.4.0-11.5.99',
      'php' => '7.4.0-8.99.99',
      'autoloader' => '7.3.5-7.99.99',
    ),
    'suggests' => 
    array (
      'dashboard' => '10.4.12-11.5.99',
    ),
    'conflicts' => 
    array (
    ),
  ),
);

