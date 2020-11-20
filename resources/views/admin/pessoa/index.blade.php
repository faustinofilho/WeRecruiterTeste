@extends('layouts.admin')

@section('title', 'Pessoa Listagem')


@section('content')

<ol class="breadcrumb bc-3">
   <li> <a href="#"><i class="fa-home"></i>Home</a> </li>
   <li> <a href="#">Pessoas</a> </li>
</ol>

<a href="{{ url('/pessoa/create') }}" class="btn btn-primary"> 
    <i class="entypo-plus"></i>
    Cadastrar
</a> 
    <br><br /> 
    <table class="table table-bordered table-striped " id="example">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
               
        </tbody>
    </table>
    <br /> 

    
@endsection

@section('scripts')

    <script type="text/javascript">

        $(document).ready(function() {
            $('#example').DataTable( {
                "processing": true,
                // "serverSide": true,
                "pageLength": 10,
                "stateSave": true,
                "ajax": {
                    "url": "{{ url('list/pessoas') }}",
                    "type": "GET"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nome" },
                    { "data": "email" },                        
                    {
                        "orderable": false,
                        "searchable": false,
                        "render": function ( data, type, full, meta ) {
                            return ''
                                + '<a class="btn btn-default btn-sm btn-icon icon-left" href="' + "{{ url('/pessoa/edit/') }}/" + full.id + '"><i class="entypo-pencil"></i> Editar</a>'
                                + '&nbsp;<a class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteRegistro('+ full.id + ');" href="#"><i class="entypo-cancel"></i>Delete</a>'
                                + '';
                        }
                    }
                ]
            } );
        } );


        function deleteRegistro(id)
        {
            if(confirm('Deseja realmente eliminar esse registro!'))
            {
                $.ajax(
                {
                    url: "{{ url('/') }}/pessoa/destroy/"+id,
                    type: 'DELETE',
                    success: function (response){
                        window.location.href = "{{ url('/categoria') }}";
                    }
                });	
            }

        }

    </script> 
@endsection