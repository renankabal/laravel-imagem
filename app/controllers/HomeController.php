<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$data['imagem'] = Session::get('img');

		return View::make('hello', compact('data'));
	}

	public function store()
	{

		$imagem = Input::file('imagem');

		$directory = public_path();//Nao estou utilizando

		$nome_imagem = $imagem->getClientOriginalName();

		//Assim era antes, dai fiz a batucada para salvar dentro do public e nao na raiz 
		// $imagem->move('images', $nome_imagem);
		// $imagem_final = 'images/'.$nome_imagem;

		// Fiz para salvar dentro do public
		$imagem->move($directory.'/images', $nome_imagem);
		$imagem_final = $directory.'/images/'.$nome_imagem;

		$int_image = Image::make($imagem_final);

		$int_image->resize(568, null, function($constraint){
			
			$constraint->aspectRatio();

		});

		$int_image->save($imagem_final);

		Session::put('img', $imagem_final);

		return Redirect::back();
	}

}
