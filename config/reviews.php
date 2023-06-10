<?php

// config for Mbsoft31/LaravelReviews
return [
    'table_names' => [
        'reviews' => 'reviews',
    ],
    'model_namespaces' => [
        'review' => '\App\Domain\Entities\Review',
    ],
    'route_prefixes' => [
        'reviews' => 'reviews',
    ],
    'middleware' => [
        'reviews' => ['api'],
    ],
    'pagination' => [
        'per_page' => 15,
    ],
    'user_model' => \Mbsoft31\LaravelReviews\Models\User::class,
];
