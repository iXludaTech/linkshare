<?php

return [

    /*
     * Class that should be automatically resolved by the IOC
     * value can be: shared, bind, singleton
     */
    'dependencies' => [
       //example: \Legato\Framework\Request::class => 'shared',
    ],
    'auth' => [
        'fields' => ['username', 'email'],
        'model' => \App\Models\User::class,
        'activation' => ['activated' => 1],
    ],
    'encryption' => [
        'key' => 'euyq74taeoqiertp',
        'cipher' => 'AES-128-CBC',
    ],
];
