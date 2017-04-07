<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
        'dsn'   => '',
        'hostname'      =>      'localhost',
        'username'      =>      '',
        'password'      =>      '',
        'database'      =>      'scspace',
        'dbdriver'      =>      'mysqli',
        'dbprefix'      =>      '',
        'pconnect'      =>      FALSE,
        'db_debug'      =>      FALSE,
        'cache_on'      =>      FALSE,
        'cachedir'      =>      '',
        'char_set'      =>      'utf8',
        'dbcollat'      =>      'utf8_general_ci',
        'swap_pre'      =>      '',
        'encrypt'       =>      FALSE,
        'compress'      =>      FALSE,
        'striction'     =>      FALSE,
        'failover'      =>      array(),
        'save_queries'  =>      TRUE
);
