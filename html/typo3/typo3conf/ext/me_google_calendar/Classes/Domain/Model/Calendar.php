<?php

namespace MediaEssenz\MeGoogleCalendar\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2020 Alexander Grein <alexander.grein@gmail.com>, MEDIA::ESSENZ
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 ***************************************************************/

/**
 *
 *
 * @package me_google_calendar
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Calendar extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

  /**
   * title
   *
   * @var string
   * @Extbase\Validate("NotEmpty")
   */
  protected $title;

  /**
   * @var string
   * @Extbase\Validate("NotEmpty")
   */
  protected $googleCalendarApiKey;

  /**
   * @var string
   * @Extbase\Validate("NotEmpty")
   */
  protected $googleCalendarId;

  /**
   * css
   *
   * @var string
   */
  protected $css;

  /**
   * fe_groups
   *
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup>
   */
  protected $feGroups;

  /**
   * Returns the title
   *
   * @return string $title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Sets the title
   *
   * @param string $title
   *
   * @return void
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }

  /**
   * @return string
   */
  public function getGoogleCalendarApiKey()
  {
    return $this->googleCalendarApiKey;
  }

  /**
   * @param string $googleCalendarApiKey
   */
  public function setGoogleCalendarApiKey($googleCalendarApiKey)
  {
    $this->googleCalendarApiKey = $googleCalendarApiKey;
  }

  /**
   * @return string
   */
  public function getGoogleCalendarId()
  {
    return $this->googleCalendarId;
  }

  /**
   * @param string $googleCalendarId
   */
  public function setGoogleCalendarId($googleCalendarId)
  {
    $this->googleCalendarId = $googleCalendarId;
  }

  /**
   * Returns the css
   *
   * @return string $css
   */
  public function getCss()
  {
    return $this->css;
  }

  /**
   * Sets the css
   *
   * @param string $css
   *
   * @return void
   */
  public function setCss($css)
  {
    $this->css = $css;
  }

  /**
   * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $feGroups
   */
  public function setFeGroups($feGroups)
  {
    $this->feGroups = $feGroups;
  }

  /**
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
   */
  public function getFeGroups()
  {
    return $this->feGroups;
  }

}
