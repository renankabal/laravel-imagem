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

		$data['modal'] = (Session::get('modal') == null ? 'false' : 'true');

		return View::make('hello', compact('data'));
	}

	public function store()
	{

		if (Input::hasFile('imagem')){


			$imagem = Input::file('imagem');

			$nome_imagem = $imagem->getClientOriginalName();

			$directory = public_path();

			$imagem->move($directory.'/images/', $nome_imagem);

			$imagem_final = $directory.'/images/'.$nome_imagem;



			$int_image = Image::make($imagem_final);

			$int_image->resize(568, null, function($constraint){
				
				$constraint->aspectRatio();

			});

			$int_image->save($imagem_final);

		}else{
			$imagem_final = Input::get('img_bckp');
		}

		Session::put('img', $imagem_final);

		return Redirect::back();
	}

}
