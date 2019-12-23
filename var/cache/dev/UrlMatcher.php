<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/getproduct' => [
            [['_route' => 'POST_getproduct_', '_controller' => 'kernel::postProduct'], null, ['POST' => 0], null, true, false, null],
            [['_route' => 'PUT_getproduct_', '_controller' => 'kernel::putProduct'], null, ['PUT' => 0], null, true, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/getproduct/([^/]++)(?'
                    .'|(*:30)'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        30 => [
            [['_route' => 'GET_getproduct_id', '_controller' => 'kernel::getProduct'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'DELETE_getproduct_id', '_controller' => 'kernel::deleteProduct'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
