<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "md_fullcalendar".
 *
 * Auto generated 17-08-2022 11:24
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'FullCalendar.io for ext:Calendarize',
  'description' => 'This extension brings the FullCalendar.io with switchable views for month, week and day to ext:calendarize. It is also possible to filter calendars by categories.',
  'category' => 'plugin',
  'version' => '3.0.1',
  'state' => 'stable',
  'uploadfolder' => false,
  'clearcacheonload' => false,
  'author' => 'Christoph Daecke',
  'author_email' => '',
  'author_company' => NULL,
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '10.4.0-11.5.99',
      'calendarize' => '8.0.0-12.99.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

