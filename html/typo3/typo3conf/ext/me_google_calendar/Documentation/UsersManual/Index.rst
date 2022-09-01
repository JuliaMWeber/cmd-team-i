.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt

Users manual
------------

- Install the extension from the TYPO3 Extension Repository or composer (package name: mediaessenz/me-google-calendar)
- Go to your root or add an extended template and include the static template "Google Calendar (me_google_calendar)"

  |add-static-template-image|

- Generate a google calendar record in a sysfolder of our choice (e.g. general storage) and fill in the fields.

  |google-calendar-feed-record-image|

  |google-calendar-feed-record-details-image|

  - Set restrictions of a feed to a specific feuser group using the access tab.
    Be aware: since the google calender feed needs to be public, this is not really save!
    Anyone who knows the public google calendar url (starts with https://calendar.google.com/calendar/embed?src=)
    can see your datas.


Get the needed google calendar api key
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

To enable the plugin to read the calendar data from google a Google Calendar API key is required.
The following description can be slightly differ from the actual procedure.

- Go to the Google Developer Console (https://console.developers.google.com/ )
  and create a new project (it takes only some seconds).
- Once in the project, go to APIs & auth > APIs on the sidebar.
- Find "Calendar API" in the list and turn it ON.
- On the sidebar, click APIs & auth > Credentials.
- In the "Public API access" section, click "Create new Key".
- Choose "Browser key".
- If you know what domains will host your calendar, enter them into the box.
  Otherwise, leave it blank. You can always change it later.
- Your new API key will appear. It might take second or two before it starts working.


Prepare your Google Calendar for access and get the needed calendar-id
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

- In the Google Calendar interface, locate the "My calendars" area on the left.
- Hover over the calendar you need and click on the appearing three vertical dots.

  |google-calendar-settings-image|

- Click on "Settings & Sharing"
- Under "access permissions" check "Make public"
- Go to "Calendar integrate" section of the same screen, and notice the needed calendar-id
  (it looks like "niqg76gl1uu5uv6dd4dleo536c@group.calendar.google.com").

  |google-calendar-integrate-image|


Define the style of your calendar
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

Depending of the restrictToPredefinedCssClasses-setting (see Configuration > Extension Manager) you can enter a css
class name (without dot) or select from a list of predefined styles (see Configuration > Examples for how to add more
items).

The predefined stylesheet definitions are:

- fc-red
- fc-green
- fc-blue
- fc-grey
- fc-orange
- fc-purple

If you like to show all events from a calendar e.g. in red, just enter the predefined CSS Class “fc-red” to the
"Css" field.

If restrictToPredefinedCssClasses (available over the extension manager settings of me_google_calendar) is set
to 1 (true), the "Css" input field changes to a "Style" select field.
In this case you can only select from a specific list of styles (Red, Green, Blue, Grey, Orange and Purple).
This list is also expandable using page typoscript.

For more info about extending css/styles go to "Configuration > Examples" of this manual.


Add a Google Calendar plugin to a page
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

- Finally add a “General Plugin” on a page of your choice and select “Calendar” under the “Plugin” tab
- Configure the output as you need
- More configuration can be done globally by using the constant editor.
  See section "Configuration > TypoScript Constants" for more info.


Support my work
^^^^^^^^^^^^^^^

This plugin was created mostly in my free time, which is becoming more and more precious since I have a family.
To keep it up for future TYPO3 and fullcalendar versions I really need your help!

- If you like and use my extension, I'd appreciate a small donation: `Flattr
  <http://flattr.com/thing/185e92a2c3c8885eb296f8e37386bcd9>`_ or `PayPal
  <https://www.paypal.com/de/cgi-bin/webscr?cmd=_send-money&nav=1&email=a.grein@mediaessenz.de>`_

- For a small monthly contribution, visit my `PATREON <https://www.patreon.com/alexandergrein>`_ page

THANK YOU in advance!
