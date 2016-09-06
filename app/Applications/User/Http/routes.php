<?php

$app->group('/users', function () {
    $this->get('', 'UserController:index');

    $this->get('/json', 'UserController:json');

    $this->get('/create', 'UserController:create');
    $this->post('', 'UserController:store');

    $this->get('/{id}/edit', 'UserController:show');
    $this->post('/{id}/update', 'UserController:update');
    
    $this->get('/{id}/remove', 'UserController:remove');
    $this->post('/{id}/destroy', 'UserController:destroy');
});
