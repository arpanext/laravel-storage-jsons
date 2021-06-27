<?php

Route::name('mongo.shell')->group(function () {

    Route::prefix('/mongo/shell/databases/list')->name('.databases')->group(function () {
        Route::get('/', 'Mongo\Shell\Databases\ListController')->name('.list');
    });

    Route::prefix('/mongo/shell/databases/{databaseName}')->name('.databases.commands')->group(function () {
        Route::post('/commands/execute', 'Mongo\Shell\Databases\Commands\ExecuteController')->name('.execute');
    });

    Route::prefix('/mongo/shell/databases/{databaseName}/collections')->name('.databases.collections')->group(function () {
        Route::get('/list', 'Mongo\Shell\Databases\Collections\ListController')->name('.list');
    });

    Route::prefix('/mongo/shell/databases/{databaseName}/collections/{collectionName}')->name('.databases.collections')->group(function () {
        Route::get('/list', 'Mongo\Shell\Databases\Collections\ListController')->name('.list');
        Route::post('/insertOne', 'Mongo\Shell\Databases\Collections\InsertOneController')->name('.insertOne');
        Route::post('/insertMany', 'Mongo\Shell\Databases\Collections\InsertManyController')->name('.insertMany');
        Route::get('/findOne', 'Mongo\Shell\Databases\Collections\FindOneController')->name('.findOne');
        Route::get('/findMany', 'Mongo\Shell\Databases\Collections\FindManyController')->name('.findMany');
        Route::patch('/updateOne', 'Mongo\Shell\Databases\Collections\UpdateOneController')->name('.updateOne');
        Route::patch('/updateMany', 'Mongo\Shell\Databases\Collections\UpdateManyController')->name('.updateMany');
        Route::put('/replaceOne', 'Mongo\Shell\Databases\Collections\ReplaceOneController')->name('.replaceOne');
        Route::delete('/deleteOne', 'Mongo\Shell\Databases\Collections\DeleteOneController')->name('.deleteOne');
        Route::delete('/deleteMany', 'Mongo\Shell\Databases\Collections\DeleteManyController')->name('.deleteMany');
    });

});
