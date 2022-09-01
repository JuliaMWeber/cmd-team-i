.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt

TypoScript Constants
^^^^^^^^^^^^^^^^^^^^

plugin.tx\_megooglecalendar.persistence
_______________________________________


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         storagePid

   Data type
         string

   Description
         Storage Pids separated by comma:
         Leave empty to ignore storage page

   Default
         Empty


.. container:: table-row

   Property
         recursive

   Data type
         number

   Description
         Recursive level:
         Only useful if storagePid is set

   Default
         0


.. ###### END~OF~TABLE ######



plugin.tx\_megooglecalendar.settings
____________________________________


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         cssPath
   
   Data type
         string
   
   Description
         If you want to customize the CSS File, define the path like:
         fileadmin/templates/css/styles.css. Leave empty to not include.
   
   Default
         EXT:me\_google\_calendar/Resources/Public/Css/main.css


.. container:: table-row

   Property
         printCssPath
   
   Data type
         string
   
   Description
         Path to print css file
   
   Default
         EXT:me\_google\_calendar/Resources/Public/Css/fullcalendar.print.css


.. container:: table-row

   Property
         cssThemePath
   
   Data type
         string
   
   Description
         Path to CSS theme file. Leave empty to not include.
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/jquery-
         ui/themes/smoothness/jquery-ui.min.css


.. container:: table-row

   Property
         jQueryPath
   
   Data type
         string
   
   Description
         Path to jQuery file. Leave empty to not include.
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/jquery/jquery.min
         .js


.. container:: table-row

   Property
         jQueryUiPath
   
   Data type
         string
   
   Description
         Path to jQuery UI file. Leave empty to not include
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/jquery-ui/jquery-
         ui.min.js


.. container:: table-row

   Property
         fullCalendarPath
   
   Data type
         string
   
   Description
         Path to jQuery calendar plugin file. Leave empty to not include.
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/fullcalendar.min.
         js


.. container:: table-row

   Property
         fullCalendarMomentPath
   
   Data type
         string
   
   Description
         Path to jQuery plugin moment.min.js file
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/moment.min.js


.. container:: table-row

   Property
         fullCalendarLangAllPath
   
   Data type
         string
   
   Description
         Path to jQuery plugin lang-all.js file
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/locale-all.js


.. container:: table-row

   Property
         gcalPath
   
   Data type
         string
   
   Description
         Path to gcal.js script file (needed for reading xml-feed from google).
         Leave empty to not include.
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/gcal.min.js


.. container:: table-row

   Property
         meGoogleCalendarPath
   
   Data type
         string
   
   Description
         Path to me\_google\_calendar.js file. Leave empty to not include.
   
   Default
         EXT:me\_google\_calendar/Resources/Public/JavaScript/main.js


.. container:: table-row

   Property
         jQueryExternal
   
   Data type
         boolean
   
   Description
         Path to jQuery is external (e.g. from an CDN)
   
   Default
         0


.. container:: table-row

   Property
         jQueryDisableCompression
   
   Data type
         boolean
   
   Description
         Disable compression of jQuery
   
   Default
         1


.. container:: table-row

   Property
         jQueryUiExternal
   
   Data type
         boolean
   
   Description
         Path to jQuery is external (e.g. from an CDN)
   
   Default
         0


.. container:: table-row

   Property
         jQueryUiDisableCompression
   
   Data type
         boolean
   
   Description
         Disable compression of jQuery-UI
   
   Default
         1


.. container:: table-row

   Property
         fullCalendarDisableCompression
   
   Data type
         boolean
   
   Description
         Disable compression of fullCalendar.js
   
   Default
         0


.. container:: table-row

   Property
         gcalDisableCompression
   
   Data type
         boolean
   
   Description
         Disable compression of gcal.js
   
   Default
         0


.. container:: table-row

   Property
         meGoogleCalendarDisableCompression
   
   Data type
         boolean
   
   Description
         Disable compression of me\_google\_calendar.js
   
   Default
         0


.. container:: table-row

   Property
         cssThemePathExternal
   
   Data type
         boolean
   
   Description
         Path to cssThemePath is external
   
   Default
         0


.. container:: table-row

   Property
         themeSystem

   Data type
         options

   Description
         Renders the calendar with a given theme system (standard, bootstrap3, jquery-ui. For more info see https://fullcalendar.io/docs/display/themeSystem/

   Default
         standard


.. container:: table-row

   Property
         jsLibsPosition
   
   Data type
         options
   
   Description
         includeJSFooterlibs: Javascript libraries in footer / includeJSlibs:
         Javascript libraries in header
   
   Default
         includeJSFooterlibs


.. container:: table-row

   Property
         jsPosition
   
   Data type
         options
   
   Description
         includeJSFooter: Javascript in footer / includeJS: Javascript in
         header
   
   Default
         includeJSFooter


.. container:: table-row

   Property
         hideHeader
   
   Data type
         boolean
   
   Description
         hide header content
   
   Default
         0


.. container:: table-row

   Property
         headerLeft
   
   Data type
         string
   
   Description
         Left header content. Allowed values: prev, next, today, title, month,
         agendaWeek, agendaDay, basicWeek, basicDay, listDay, listWeek, listMonth,
         listYear, list. Use comma for separation and [Space] for distance.
   
   Default
         prev,next today


.. container:: table-row

   Property
         headerCenter
   
   Data type
         string
   
   Description
         Center header content. Allowed values: prev, next, today, title, month,
         agendaWeek, agendaDay, basicWeek, basicDay, listDay, listWeek, listMonth,
         listYear, list. Use comma for separation and [Space] for distance.
   
   Default
         title


.. container:: table-row

   Property
         headerRight
   
   Data type
         string
   
   Description
         Right header content. Allowed values: prev, next, today, title, month,
         agendaWeek, agendaDay, basicWeek, basicDay, listDay, listWeek, listMonth,
         listYear, list. Use comma for separation and [Space] for distance.
   
   Default
         month,agendaWeek,agendaDay


.. container:: table-row

   Property
         hideFooter

   Data type
         boolean

   Description
         hide footer content

   Default
         1


.. container:: table-row

   Property
         footerLeft

   Data type
         string

   Description
         Left footer content. Allowed values: prev, next, today, title, month,
         agendaWeek, agendaDay, basicWeek, basicDay, listDay, listWeek, listMonth,
         listYear, list. Use comma for separation and [Space] for distance.

   Default
         prev,next today


.. container:: table-row

   Property
         footerCenter

   Data type
         string

   Description
         Center footer content. Allowed values: prev, next, today, title, month,
         agendaWeek, agendaDay, basicWeek, basicDay, listDay, listWeek, listMonth,
         listYear, list. Use comma for separation and [Space] for distance.

   Default
         title


.. container:: table-row

   Property
         footerRight

   Data type
         string

   Description
         Right footer content. Allowed values: prev, next, today, title, month,
         agendaWeek, agendaDay, basicWeek, basicDay, listDay, listWeek, listMonth,
         listYear, list. Use comma for separation and [Space] for distance.

   Default
         month, agendaWeek, agendaDay


.. container:: table-row

   Property
         defaultView
   
   Data type
         string
   
   Description
         Default view of the calendarAllowed values:
         month, agendaWeek, agendaDay, basicWeek, basicDay, listDay, listWeek,
         listMonth, listYear, list
   
   Default
         AgendaWeek


.. container:: table-row

   Property
         allDaySlot
   
   Data type
         boolean
   
   Description
         Show all day events slot in agenda views
   
   Default
         0


.. container:: table-row

   Property
         firstDay
   
   Data type
         number
   
   Description
         First day of week. Can be 0 for sunday or 1 for monday
   
   Default
         0


.. container:: table-row

   Property
         weekends
   
   Data type
         boolean
   
   Description
         Show weekends as well
   
   Default
         0


.. container:: table-row

   Property
         weekNumbers

   Data type
         boolean

   Description
         Show week numbers

   Default
         0


.. container:: table-row

   Property
         weekNumbersWithinDays

   Data type
         boolean

   Description
         Show week numbers within days

   Default
         0


.. container:: table-row

   Property
         weekNumberCalculation

   Data type
         string

   Description
         Week number calculation

   Default
         ISO


.. container:: table-row

   Property
         minTime
   
   Data type
         string
   
   Description
         Mix time for agenda views in format hh:mm:ss
   
   Default
         00:00:00


.. container:: table-row

   Property
         maxTime
   
   Data type
         string
   
   Description
         Max time for agenda views in format hh:mm:ss
   
   Default
         24:00:00


.. container:: table-row

   Property
         scrollTime
   
   Data type
         string
   
   Description
         Scroll to time in format hh:mm:ss
   
   Default
         08:00:00


.. container:: table-row

   Property
         weekMode
   
   Data type
         string
   
   Description
         Defines the way week are shown in month. Can be 'fixed' or 'variable'
   
   Default
         variable


.. container:: table-row

   Property
         hideTitle
   
   Data type
         boolean
   
   Description
         Hide title content
   
   Default
         0


.. container:: table-row

   Property
         eventLimit

   Data type
         boolean

   Description
         Show more events link, if they do not fit into time slot

   Default
         0


.. container:: table-row

   Property
         titleFormat.month
   
   Data type
         string
   
   Description
         Date format\* for month title
   
   Default
         MMMM YYYY


.. container:: table-row

   Property
         titleFormat.week
   
   Data type
         string
   
   Description
         Date format\* for week title
   
   Default
         MMM D YYYY


.. container:: table-row

   Property
         titleFormat.day
   
   Data type
         string
   
   Description
         Date format\* for day title
   
   Default
         MMMM D YYYY


.. container:: table-row

   Property
         columnFormat.month
   
   Data type
         string
   
   Description
         Defines the column format\* for the month view
   
   Default
         dddd


.. container:: table-row

   Property
         columnFormat.week
   
   Data type
         string
   
   Description
         Defines the column format\* for the week view
   
   Default
         ddd DD.MM.


.. container:: table-row

   Property
         columnFormat.day
   
   Data type
         string
   
   Description
         Defines the column format\* for the day view
   
   Default
         dddd DD.MM.


.. container:: table-row

   Property
         listDayFormat

   Data type
         string

   Description
         Defines the left date format\* for the list view

   Default
         DD. MMMM YYYY


.. container:: table-row

   Property
         listDayAltFormat

   Data type
         string

   Description
         Defines the right date format\* for the list view

   Default
         ddddd


.. container:: table-row

   Property
         timeFormat.agenda
   
   Data type
         string
   
   Description
         Time format\* for agenda view
   
   Default
         HH:mm


.. container:: table-row

   Property
         timeFormat.list

   Data type
         string

   Description
         Time format\* for list view

   Default
         HH:mm


.. container:: table-row

   Property
         timeFormat.day

   Data type
         string

   Description
         Time format\* for day view

   Default
         HH:mm


.. container:: table-row

   Property
         timeFormat.week

   Data type
         string

   Description
         Time format\* for week view

   Default
         HH:mm


.. container:: table-row

   Property
         timeFormat.month

   Data type
         string

   Description
         Time format\* for month view

   Default
         HH:mm


.. container:: table-row

   Property
         timeFormat.general
   
   Data type
         string
   
   Description
         General time format\*
   
   Default
         HH:mm


.. container:: table-row

   Property
         timeZone

   Data type
         string

   Description
         e.g. Europe/Berlin. If empty (default) the timezone defined inside google UI will be used

   Default



.. container:: table-row

   Property
         noGoogleMapsLink
   
   Data type
         boolean
   
   Description
         Do not generate link to google maps
   
   Default
         0


.. container:: table-row

   Property
         hideIcalDownloadButton
   
   Data type
         boolean
   
   Description
         Hide ical download button in event details
   
   Default
         0


.. container:: table-row

   Property
         hideAddtoGoogleCalendarButton
   
   Data type
         boolean
   
   Description
         Hide add to google calendar button
   
   Default
         0


.. container:: table-row

   Property
         height
   
   Data type
         integer
   
   Description
         Height of calendar
   
   Default
         0


.. container:: table-row

   Property
         aspectRatio

   Data type
         string

   Description
         Aspect ratio

   Default
         1.35


.. container:: table-row

   Property
         overrideFlexformSettingsIfEmpty
   
   Data type
         string
   
   Description
         Override flexform setting if empty
   
   Default
         cssThemePath, headerLeft, headerCenter, headerRight, footerLeft, footerCenter, footerRight, defaultView,
         allDaySlot, firstDay, firstHour, weekends, minTime, maxTime, hideTitle, hideIcalDownloadButton,
         hideAddtoGoogleCalendarButton, noGoogleMapsLink, height


.. container:: table-row

   Property
         eIdGetIcsUrl
   
   Data type
         string
   
   Description
         eID Script URL for ics file generation
   
   Default
         /index.php?eID=meGoogleCalendarEidGetIcs


.. container:: table-row

   Property
         language
   
   Data type
         string
   
   Description
         language key
   
   Default
         de


.. ###### END~OF~TABLE ######

\* For more infos about the time/date format, please read the
documentation on the website of the FullCalendar plugin author:

`https://fullcalendar.io/docs/date-library#formatdates
<https://fullcalendar.io/docs/date-library#formatdates>`_
