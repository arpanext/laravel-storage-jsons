<?php

Route::post('/databases/{database}/collections/{collection}', 'Mongo\Databases\Collections\InsertOneController')->name('store');

