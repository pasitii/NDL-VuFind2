<?php
namespace FinnaApi\Module\Configuration;

$config = [
    'controllers' => [
        'factories' => [
            'FinnaApi\Controller\AdminApiController' => 'FinnaApi\Controller\Factory::getAdminApiController',
            'FinnaApi\Controller\ApiController' => 'FinnaApi\Controller\Factory::getApiController',
            'FinnaApi\Controller\AuthApiController' => 'FinnaApi\Controller\Factory::getAuthApiController',
            'FinnaApi\Controller\SearchApiController' => 'FinnaApi\Controller\Factory::getSearchApiController',
        ],
        'aliases' => [
            'AdminApi' => 'FinnaApi\Controller\AdminApiController',
            'AuthApi' => 'FinnaApi\Controller\AuthApiController',

            // Overrides:
            'VuFindApi\Controller\ApiController' => 'FinnaApi\Controller\ApiController',
            'VuFindApi\Controller\SearchApiController' => 'FinnaApi\Controller\SearchApiController',
        ]
    ],
    'router' => [
        'routes' => [
            'adminApi' => [
                'type' => 'Zend\Router\Http\Segment',
                'verb' => 'get,post,options',
                'options' => [
                    'route'    => '/adminapi[/v1][/]',
                    'defaults' => [
                        'controller' => 'AdminApi',
                        'action'     => 'Index',
                    ]
                ]
            ],
            'apiHomeBareV1' => [
                'type' => 'Zend\Router\Http\Segment',
                'verb' => 'get,post,options',
                'options' => [
                    'route'    => '/v1[/]',
                    'defaults' => [
                        'controller' => 'Api',
                        'action'     => 'Index',
                    ]
                ],
            ],
            'authApiV1' => [
                'type' => 'Zend\Router\Http\Segment',
                'verb' => 'get,post,options',
                'options' => [
                    'route'    => '/api/v1/auth/[:action]',
                    'defaults' => [
                        'controller' => 'AuthApi'
                    ]
                ]
            ],
            'searchApiBareV1' => [
                'type' => 'Zend\Router\Http\Literal',
                'verb' => 'get,post,options',
                'options' => [
                    'route'    => '/v1/search',
                    'defaults' => [
                        'controller' => 'SearchApi',
                        'action'     => 'search',
                    ]
                ]
            ],
            'recordApiBareV1' => [
                'type' => 'Zend\Router\Http\Literal',
                'verb' => 'get,post,options',
                'options' => [
                    'route'    => '/v1/record',
                    'defaults' => [
                        'controller' => 'SearchApi',
                        'action'     => 'record',
                    ]
                ]
            ]
        ]
    ]
];

return $config;