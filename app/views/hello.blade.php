<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="jcrop/css/jquery.Jcrop.min.css">
	<style>
		.jcrop-holder{
			opacity: 0;
		}
	</style>
</head>
<body>

	{{ Form::open(array('route' => 'postImage', 'files' => 'true')) }}

		{{ HTML::image($data['imagem'], '') }}

		<br>

		{{ Form::file('imagem') }}

		{{ Form::submit('Enviar imagem') }}

	{{ Form::close() }}
	<script src="jcrop/js/jquery.min.js"></script>

	<script src="jcrop/js/jquery.Jcrop.min.js"></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
