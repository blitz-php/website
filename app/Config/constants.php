<?php 

defined('DEFAULT_VERSION') || define('DEFAULT_VERSION', 'dev');

if (! defined('SHOW_PROMO')) {
    $int = random_int(1, 3);

    if ($int === 1) {
        define('SHOW_PROMO', 'FORGE');
    } elseif ($int === 2) {
        define('SHOW_PROMO', 'VAPOR');
    } elseif ($int === 3) {
        define('SHOW_PROMO', 'PARTNERS');
    }
}
