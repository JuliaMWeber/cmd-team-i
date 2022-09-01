.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt

Examples
^^^^^^^^

TS Constants Example
____________________

.. code-block:: typoscript

   plugin.tx_megooglecalendar {
      settings {

         # change included jquery to a cdn version
         jQueryPath = //ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js
         jQueryExternal = 1

         # switch from jquery-ui theme/dialog to bootstrap 3:
         themeSystem = bootstrap3
         jQueryUiPath =
         cssThemePath =

         # change min and max time
         minTime = 08:00:00
         maxTime = 18:00:00

         # set first day to monday
         firstDay = 1

      }
   }


CSS / Style Examples
____________________

If you want to show all events from a calendar in red, just add the
predefined CSS Class “fc-red” to the google calendar feed record field "Css".

There are six already predefined style definitions in the included main.css file:

fc-red, fc-green, fc-blue, fc-grey, fc-orange, fc-purple

You also can define your own colors by adding this css (example for “my-color-1”):

.. code-block:: css

   .fc-event.my-color-1,
   .fc-agenda .fc-event.my-color-1 .fc-event-time,
   .fc-event.my-color-1 .fc-event-inner.fc-event-skin,
   .fc-list-item.my-color-1 .fc-event-dot,
   .fc-event.my-color-1 a {
      background-color:#ff0000;
      border-color:#ff0000;
      color:#fff;
   }

If you want to restrict backend user to only selectable styles, you can set the flag "restrictToPredefinedCssClasses",
which is available in the extension manager settings of me_google_calendar.
If activated, the css input field inside the google calendar record changes to a select field containing only the predefined
css styles.

If you want to extend the list or remove some items please use page typoscript.

The following example code removes all predefined styles and adds the above css example:

.. code-block:: typoscript

    TCEFORM {
        tx_megooglecalendar_domain_model_calendar {
            css {
                removeItems = fc-red,fc-green,fc-blue,fc-grey,fc-orange,fc-purple
                addItems {
                    my-color-1 = My Color 1
                }
            }
        }
    }

