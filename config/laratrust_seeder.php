<?php

return [
    'role_structure' => [
        'super_admin' => [

            'users' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'roles' => 'c,r,u,d',



        ],
        'admin' => [

            'users' => 'c,r',
            'admins' => 'c,r',

            'roles' => 'c,r',



        ]


    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
