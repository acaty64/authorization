<?php

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//use Symfony\Component\HttpFoundation\Response;


Route::get('/', 'dashboard@index')
	->name('admin_dashboard');

/// Route:: ....

Route::any('{any}',function()
{
	throw new NotFoundHttpException("Página inválida");
	
	//return response()->view('errors/404', [], 404);
})->where('any', '.*');