<?php

//
// Файл с настройками
//
$conf = [
    'auth' => [
        'AIROS_SESSIONID' => '',

        'username' => '',
        'password' => '',

        '_token' => '',
        'email' => '',
    ],

    'urls' => [
        'login' => 'https://...', // адрес куда отправляются авторизационные даныне
        'profile' => 'https://...', // дополнительный адре
    ],

    // это переменная которая отвечает за то
    // где будут хранитсья куки
    'cookie_file' => realpath(implode(DIRECTORY_SEPARATOR, [
            dirname(__FILE__),
            '..',
            'store',
            'cookie.txt'
        ])),
];
