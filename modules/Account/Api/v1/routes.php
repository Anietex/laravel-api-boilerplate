<?php

use Dingo\Api\Routing\Router;


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function (Router $api) {
    $api->group(["namespace"=>'Swedigo\Modules\Account\Api\v1\Controllers'],function() use ($api){

        $api->get('/register','UserController@register');

        $api->group(["prefix"=>"services"], function () use ($api){

            $api->post("create","ServiceController@store");
            $api->get("list","ServiceController@index");
        });
    } );
});
