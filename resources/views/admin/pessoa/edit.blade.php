@extends('layouts.admin')

@section('title', 'Cadastrar Pessoa')


@section('content')
<ol class="breadcrumb bc-3">
   <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
   <li> <a href="{{ url('/pessoa') }}">Pessoa</a> </li>
   <li> <a href="#">Cadastro</a> </li>
</ol>

<div class="panel panel-primary">
   <div class="panel-heading">
      <div class="panel-title"></div>
      <div class="panel-options"> <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a> <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a> <a href="#" data-rel="close"><i class="entypo-cancel"></i></a> </div>
   </div>
   <div class="panel-body">

   	<div class="alert alert-danger" id='erro' style="display:none">
	</div>

	<div class="alert alert-success" id="success" style="display:none"><strong>Registro efetuado com sucesso!</strong></div>

      <form role="form" name="form_project" method="post" class="validate" novalidate="novalidate">
      
	  <input type="hidden" name="id" value="{{ $pessoa->id }}">

      <div class="form-group"> 
			 <label class="control-label">Codigo</label> 
			 <input type="text" class="form-control" name="nome" value="{{ $pessoa->id ?? '' }}"  disabled  placeholder="Nome"> 
		</div>
	  <div class="form-group"> 
			 <label class="control-label">Categoria</label> 
			 <select name="categoria_id" id="categoria_id" class="select2" data-allow-clear="true" data-placeholder="Selecione um fornecedor">
			<option></option>
				@foreach($categorias as $categoria)
					<option value="{{ $categoria->id }}" {{  $pessoa->categoria_id == $categoria->id? 'selected' : '' }}>{{ $categoria->nome }}</option>
				@endforeach
			</select>
		</div>
		
         <div class="form-group"> 
			 <label class="control-label">Nome do pessoa</label> 
			 <input type="text" class="form-control" name="nome" value="{{ $pessoa->nome ?? '' }}" data-validate="required"  placeholder="Nome"> 
		</div>

		<div class="form-group"> 
			 <label class="control-label">E-mail</label> 
			 <input type="text" class="form-control" name="email" value="{{ $pessoa->email ?? '' }}" data-validate="required"  placeholder="exemplo@exemplo.com"> 
		</div>
		
		<div class="form-group"> 
			<button type="button" id="enviaForm" class="btn btn-success">Cadastrar</button> 
		</div>

      </form>
   </div>
</div>

@endsection


@section('scripts')
<script>

	$('#enviaForm').on('click', function() {

		var formdata = new FormData($("form[name='form_project']")[0]);

			$.ajax({
				type: 'POST',
				url: "{{ url('/pessoa/create') }}",
				data: formdata ,
				processData: false,
				contentType: false,
				success: function (response) {
					$('#success').css('display', 'block');
					setTimeout( function() {
						$('#success').css('display', 'none');
						window.location.href = "{{ url('/pessoa') }}";
					}, 4000 );
				},
				error : function(response){
					$('#erro').css('display', 'block');
					var html = "";
					$('#erro').empty();
					$.each(response.responseJSON.errors, function(i, item)
					{
						html +='<li> '+item+'</li>';
					});
					$('#erro').append(html);

					setTimeout( function() {
						$('#erro').css('display', 'none');
					}, 4000 );
				}
				
			});		
	});

</script>
@endsection