<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="jcrop/css/jquery.Jcrop.min.css">
</head>
<body>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Recorte da imagem</h4>
	      </div>
	      <div class="modal-body">
	        {{ HTML::image($data['imagem'],'', ['id' => 'crop']) }}
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary">Salvar recorte</button>
	      </div>
	    </div>
	  </div>
	</div>


	{{ Form::open(array('route' => 'postImage', 'files' => 'true')) }}

		<img src="{{  $data['imagem']}}">
		<br>
		{{ Form::file('imagem') }}

		{{ Form::submit('Enviar imagem') }}

	{{ Form::close() }}

	<script src="jcrop/js/jquery.min.js"></script>

	<script src="jcrop/js/jquery.Jcrop.min.js"></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	
	<script>
		$(document).ready(function(){

			$('#crop').Jcrop({
				aspectRatio: 1, 
				onSelect: atualizaCoordenadas
			});

			$('#myModal').modal({show: true});
		});

		function atualizaCoordenadas(c){
			$('#x').value(c.x);
			$('#y').value(c.y);
			$('#w').value(c.w);
			$('#h').value(c.h);
		}

		function checkCoords(c){
			if(parseInt($('#w').value())) return true;

			alert('Selecione alguma coisa');

			return false;
		}
	</script>
</body>
</html>
