<?php

Route::name('storage.jsons.databases.')->group(function () {
    Route::prefix('/mongo/shell/databases/{databaseName}')->name('commands.')->group(function () {
        Route::post('/commands/execute', 'Mongo\Shell\Databases\Commands\ExecuteController')->name('execute');
    });
    Route::prefix('/mongo/shell/databases/{databaseName}/collections/{collectionName}')->name('collections.')->group(function () {
        Route::post('/insertOne', 'Mongo\Shell\Databases\Collections\InsertOneController')->name('insertOne');
        Route::post('/insertMany', 'Mongo\Shell\Databases\Collections\InsertManyController')->name('insertMany');
        Route::get('/findOne', 'Mongo\Shell\Databases\Collections\FindOneController')->name('findOne');
        Route::get('/findMany', 'Mongo\Shell\Databases\Collections\FindManyController')->name('findMany');
        Route::patch('/updateOne', 'Mongo\Shell\Databases\Collections\UpdateOneController')->name('updateOne');
        Route::patch('/updateMany', 'Mongo\Shell\Databases\Collections\UpdateManyController')->name('updateMany');
        Route::put('/replaceOne', 'Mongo\Shell\Databases\Collections\ReplaceOneController')->name('replaceOne');
        Route::delete('/deleteOne', 'Mongo\Shell\Databases\Collections\DeleteOneController')->name('deleteOne');
        Route::delete('/deleteMany', 'Mongo\Shell\Databases\Collections\DeleteManyController')->name('deleteMany');
    });
});
