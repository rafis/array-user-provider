<?php

/**
 * Provide a list of users which are allowed to authenticate to your application.
 *
 * @license MIT
 * @package rafis\array-user-provider
 */

return [

    'users' => [
        [
            'login' => 'johndoe',
            'password' => sha1('123456'),
        ],
    ],

];
