<?php
$insulinController = new InsulinController();

// Ruta de creación de registro de insulina
$router->get('/insulin/create', [$insulinController, 'create']);
$router->post('/insulin/create', [$insulinController, 'create']);

// Ruta de edición de registro de insulina
$router->get('/insulin/edit/{id}', [$insulinController, 'edit']);
$router->post('/insulin/edit/{id}', [$insulinController, 'edit']);

// Ruta de eliminación de registro de insulina
$router->get('/insulin/delete/{id}', [$insulinController, 'delete']);

// Ruta de listado de registros de insulina
$router->get('/insulin/list', [$insulinController, 'list']);
