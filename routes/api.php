<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Task Status
    Route::apiResource('task-statuses', 'TaskStatusApiController');

    // Task
    Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
    Route::apiResource('tasks', 'TaskApiController');

    // Properties
    Route::apiResource('properties', 'PropertiesApiController');

    // Vehicles
    Route::apiResource('vehicles', 'VehiclesApiController');

    // Contracts
    Route::post('contracts/media', 'ContractsApiController@storeMedia')->name('contracts.storeMedia');
    Route::apiResource('contracts', 'ContractsApiController');
});
