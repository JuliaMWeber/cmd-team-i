<?php

$iniPath = php_ini_loaded_file();
$paccount = explode("/", $iniPath)[4];
$dumpFile = '/home/www/' . $paccount .  '/tmp/' . $paccount . '_opcache_dump.data';

// check if opcache is loaded
if (extension_loaded('Zend OPcache'))
{
    // check if opcache is enabled
    if (ini_get('opcache.enable'))
    {
        $status = opcache_get_status();
        $scripts = array_keys($status['scripts']);
        file_put_contents($dumpFile, implode($scripts, PHP_EOL));
    }
}
