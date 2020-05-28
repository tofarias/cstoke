@extends('layouts.app')

@section('my_javascript_content')

    $(function(){
        $('.btn-delete[delete]').click(function(a){
            if( confirm('Excluir o registro?') ){
                
                var id = $(this).attr('delete');
                var urlTarget = '{!! route("product.delete") !!}';
                var token = $('[name="_token"]').val();

                $.post( urlTarget, {'_token': token, 'id': id}, function( response ) {
                    if(response.delete != null){
                        if( response.delete ){
                            alert(response.message);
                            $('.btn-delete[delete='+response.id+']').closest('tr').remove();
                            $('span#total').text(response.total)
                        }
                    }
                });
            }
        });
    });
    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Produtos Cadastrados <span id="total" class="badge badge-lg badge-info">{!! $total !!}</span></h3></div>

                <div class="card-body">
                    
                    {!! Form::token() !!}
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Fabricante</th>
                            <th scope="col">Ativo</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $products as $key => $product )
                            <tr title="{!! $product->id !!}">
                                <th scope="row">{!! ($key+1) !!}</th>
                                <td>{!! $product->name !!}</td>
                                <td>{!! $product->category->name !!}</td>
                                <td>{!! $product->model !!}</td>
                                <td>{!! $product->manufacturer->name !!}</td>
                                <td align="center">
                                    @if( $product->active == 1 )
                                    <span class="badge badge-success">SIM</span>
                                    @else
                                    <span class="badge badge-warning">NÃO</span>
                                    @endif
                                </td>
                                <td align="center">
                                    <a href="{!! route('showEditForm',$product->id) !!}"><button type="button" class="btn btn-sm btn-info">Editar</button></a>
                                    <button id="" delete="{!! $product->id !!}" type="button" class="btn-delete btn btn-sm btn-danger">Excluir</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection