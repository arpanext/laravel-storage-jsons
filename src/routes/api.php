<?php

Route::post('/databases/{databaseName}/command', 'Databases\CommandController')->name('command');

Route::post('/databases/{databaseName}/collections/{collectionName}/insertOne', 'Databases\Collections\InsertOneController')->name('insertOne');

Route::post('/databases/{databaseName}/collections/{collectionName}/insertMany', 'Databases\Collections\InsertManyController')->name('insertMany');

Route::get('/databases/{databaseName}/collections/{collectionName}/findMany', 'Databases\Collections\FindManyController')->name('findMany');

Route::get('/databases/{databaseName}/collections/{collectionName}/findOne', 'Databases\Collections\FindOneController')->name('findOne');
