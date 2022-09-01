.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt

Known problems
--------------

- Sometimes, if you update from an earlier version, old flexform settings could result in unexpected results.
  Have a look at the famose extension "typo3_console" from helmut hummel to fix this problems by using the
  cli command "vendor/bin/typo3cms cleanup:flexforms".
  Another way is to open the plugin over the backend, clear the content of the database field pi_flexform of the
  corresponding tt_content record using e.g. PhpMyAdmin and press save inside the backend.

- For other things please contact me


