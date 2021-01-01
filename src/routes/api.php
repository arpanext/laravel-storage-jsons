<?php

Route::name('storage.jsons.databases.')->group(function () {
    Route::prefix('/storage/jsons/databases/{databaseName}')->name('commands.')->group(function () {
        Route::post('/commands/execute', 'Storage\Jsons\Databases\Commands\ExecuteController')->name('execute');
    });
    Route::prefix('/storage/jsons/databases/{databaseName}/collections/{collectionName}')->name('collections.')->group(function () {
        Route::post('/insertOne', 'Storage\Jsons\Databases\Collections\InsertOneController')->name('insertOne');
        Route::post('/insertMany', 'Storage\Jsons\Databases\Collections\InsertManyController')->name('insertMany');
        Route::get('/findMany', 'Storage\Jsons\Databases\Collections\FindManyController')->name('findMany');
        Route::get('/findOne', 'Storage\Jsons\Databases\Collections\FindOneController')->name('findOne');
        Route::patch('/updateOne', 'Storage\Jsons\Databases\Collections\UpdateOneController')->name('updateOne');
        Route::patch('/updateMany', 'Storage\Jsons\Databases\Collections\UpdateManyController')->name('updateMany');
    });
});
