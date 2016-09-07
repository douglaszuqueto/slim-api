<?php

$app->group('/users', function () {
    $this->get('', 'UserController:index');
    $this->get('/{id}', 'UserController:show');
    $this->post('', 'UserController:store');
    $this->post('/{id}/update', 'UserController:update');
    $this->post('/{id}/destroy', 'UserController:destroy');
});
