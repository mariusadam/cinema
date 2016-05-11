<?php

return [
    'routes' => require __DIR__.'/../config/routes.php',
    'repositories' => [
        'users' => [
            'repository' => 'Repository\UserRepository',
            'db_table' => 'users'
        ],
        'movies' => [
            'repository' => 'Repository\MovieRepository',
            'db_table' => 'movies'
        ]
    ]
];


