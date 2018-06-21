<?php

/** @var Laravel\Lumen\Routing\Router $router */

$router->get('/', 'QuestController@index');
$router->post('quests', 'QuestController@generate');
$router->get('missions/{id}/complete', 'MissionController@complete');
$router->get('reset', 'ResetController@index');
