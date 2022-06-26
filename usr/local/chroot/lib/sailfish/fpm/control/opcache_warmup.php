<?php

/**
 *  Warmup cached php files in opcache after invalidating caches
 *
 */
if (!function_exists('opcache_get_configuration'))
{
    die('OPCache is not installed/running');
}

$iniPath = php_ini_loaded_file();
$paccount = explode("/", $iniPath)[4];
$dumpFile = '/home/www/' . $paccount .  '/tmp/' . $paccount . '_opcache_dump.data';

if(file_exists($dumpFile))
{
    $data = file($dumpFile);
}
else
{
    die('dumpfile "' . dumpFile . '" does not exist');
}

if (empty($data))
{
    die('no cached files');
}

foreach ($data as $script)
{
    $script = trim($script);
    if (file_exists ($script))
    {
        try {
            // suppress compile_file warnings when file not found
            // possible, because opcache_compile_file is fault tolerant and won't do harm if files aren't found
            // (indicates that those files aren't valid anymore anyway)
            @opcache_compile_file($script);
        } catch(Exception $e) {}
    }
}
