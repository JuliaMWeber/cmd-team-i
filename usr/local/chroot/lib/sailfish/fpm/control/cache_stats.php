<?php

$stats = array(
    'opcache' => array('enabled' => FALSE),
    'apcu' => array('enabled' => FALSE)
);

// check if opcache is loaded
if (extension_loaded('Zend OPcache'))
{
    // check if opcache is enabled
    if (ini_get('opcache.enable'))
    {
        $stats['opcache']['status'] = opcache_get_status(FALSE);
        $stats['opcache']['config'] = opcache_get_configuration();
        $stats['opcache']['enabled'] = TRUE;
    }
}

// check if apcu is loaded
if (extension_loaded('apcu'))
{
    // check if apcu is enabled
    if (ini_get('apc.enabled'))
    {
        $stats['apcu']['cache'] = apcu_cache_info(TRUE);
        $stats['apcu']['sma'] = apcu_sma_info(TRUE);
        $stats['apcu']['enabled'] = TRUE;
    }
}


echo json_encode($stats);
