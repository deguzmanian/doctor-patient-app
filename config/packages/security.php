<?php

use App\Entity\User;

$container->loadFromExtension('security', array(
    'encoders' => array(
        User::class => 'bcrypt',
    ),
    // 'providers' => array(
    //     'our_db_provider' => array(
    //         'entity' => array(
    //             'class'    => User::class,
    //             'property' => 'username',
    //         ),
    //     ),
    // ),
    // 'firewalls' => array(
    //     'main' => array(
    //         'pattern'    => '^/',
    //         'http_basic' => null,
    //         'provider'   => 'our_db_provider',
    //     ),
    // ),
));