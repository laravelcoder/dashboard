<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('locations', 'LocationsController', ['except' => ['create', 'edit']]);

        Route::resource('websites', 'WebsitesController', ['except' => ['create', 'edit']]);

        Route::resource('analytics', 'AnalyticsController', ['except' => ['create', 'edit']]);

        Route::resource('bookings', 'BookingsController', ['except' => ['create', 'edit']]);

        Route::resource('zipcodes', 'ZipcodesController', ['except' => ['create', 'edit']]);

});
