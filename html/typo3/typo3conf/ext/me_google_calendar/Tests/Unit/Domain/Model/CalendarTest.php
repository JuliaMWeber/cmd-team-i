<?php

namespace MediaEssenz\MeGoogleCalendar\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Alexander Grein <alexander.grein@gmail.com>, MEDIA::ESSENZ
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
 ***************************************************************/

/**
 * Test case for class \MediaEssenz\MeGoogleCalendar\Domain\Model\Calendar.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Google Calendar
 *
 * @author Alexander Grein <alexander.grein@gmail.com>
 */
class CalendarTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase
{
    /**
     * @var \MediaEssenz\MeGoogleCalendar\Domain\Model\Calendar
     */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new \MediaEssenz\MeGoogleCalendar\Domain\Model\Calendar();
    }

    public function tearDown()
    {
        unset($this->fixture);
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->fixture->setTitle('Conceived at T3CON10');

        $this->assertSame(
            'Conceived at T3CON10',
            $this->fixture->getTitle()
        );
    }

    /**
     * @test
     */
    public function getGoogleCalendarApiKeyReturnsInitialValueForString()
    {
    }

    /**
     * @test
     */
    public function setGoogleCalendarApiKeyForStringSetsGoogleApiKey()
    {
        $this->fixture->setGoogleCalendarApiKey('Conceived at T3CON10');

        $this->assertSame(
            'Conceived at T3CON10',
            $this->fixture->getGoogleCalendarApiKey()
        );
    }

    /**
     * @test
     */
    public function getGoogleCalendarIdReturnsInitialValueForString()
    {
    }

    /**
     * @test
     */
    public function setGoogleCalendarIdForStringSetsGoogleCalendarId()
    {
        $this->fixture->setGoogleCalendarId('Conceived at T3CON10');

        $this->assertSame(
            'Conceived at T3CON10',
            $this->fixture->getGoogleCalendarId()
        );
    }

    /**
     * @test
     */
    public function getCssReturnsInitialValueForString()
    {
    }

    /**
     * @test
     */
    public function setCssForStringSetsCss()
    {
        $this->fixture->setCss('Conceived at T3CON10');

        $this->assertSame(
            'Conceived at T3CON10',
            $this->fixture->getCss()
        );
    }

}

?>