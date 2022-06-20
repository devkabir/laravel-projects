<?php

// for any thig, this root will return app.blade.php
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
