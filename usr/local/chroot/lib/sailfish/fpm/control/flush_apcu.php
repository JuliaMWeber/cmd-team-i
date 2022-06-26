<?php

if (extension_loaded('apcu')) {
    apcu_clear_cache();
}
