<?php

if (function_exists('opcache_reset')) {
    // flush cache twice to really clear cache.
    // under special circumstances opcache won't be cleared properly on the first try.
    // see: http://stackoverflow.com/questions/25563692/how-to-clear-user-cache-in-apcu
    opcache_reset();
    opcache_reset();
}
