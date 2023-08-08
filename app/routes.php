<?php

declare(strict_types=1);

use Slim\App;
use App\SortController;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/sort', function (RouteCollectorProxy $group) {
        $controller = new SortController();
        $group->post('/add', [$controller, 'addToSortedList']);
        $group->get('/search/{value}', [$controller, 'searchOnSortedList']);
        $group->delete('/search/{value}', [$controller, 'deleteFromSortedList']);
        $group->get('/traverse', [$controller, 'traverseSortedList']);
        $group->get('/unset', [$controller, 'unsetSession']);
    });
};
