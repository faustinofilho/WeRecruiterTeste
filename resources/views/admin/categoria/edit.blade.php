@extends('layouts.admin')

@section('title', 'Categoria Editar')


@section('content')
<ol class="breadcrumb bc-3">
   <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
   <li> <a href="{{ url('/categoria') }}">Categorias</a> </li>
   <li> <a href="#">Editar</a> </li>
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
            <input type="hidden" name="id" value="{{ $categoria->id }}">
         <div class="form-group"> 
			 <label class="control-label">Nome</label> 
			 <input type="text" class="form-control" name="nome" data-validate="required"  placeholder="Nome da categoria" value="{{ $categoria->nome }}"> 
		</div>
		
		<div class="form-group"> 
			<button type="button" id="enviaForm" class="btn btn-success">Alterar</button> 
		</div>

      </form>
   </div>
</div>

@endsection


@section('scripts')
<script>

	// function deleteProjeto(id)
	// {
	// 	if(confirm('Do you really want to delete that record?')){
				
	// 		$.ajax(
	// 		{
	// 			url: "{{ url('/') }}/admin/projeto/"+id,
	// 			type: 'DELETE',
	// 			success: function (response){
	// 				listPorject(response.projetos);
	// 			}
	// 		});			
	// 	}
	// }

	$('#enviaForm').on('click', function() {

		var formdata = new FormData($("form[name='form_project']")[0]);

			$.ajax({
				type: 'POST',
				url: "{{ url('/categoria/create') }}",
				data: formdata ,
				processData: false,
				contentType: false,
				success: function (response) {
					$('#success').css('display', 'block');
					setTimeout( function() {
						$('#success').css('display', 'none');
						window.location.href = "{{ url('/categoria') }}";
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