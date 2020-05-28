@extends('layouts.app')

@section('my_javascript_content')

    $(function(){
        $('.btn-delete[delete]').click(function(a){
            if( confirm('Excluir o registro?') ){
                
                var id = $(this).attr('delete');
                var urlTarget = '{!! route("product.delete", ["id" => '+id+']) !!}';
                var token = $('[name="_token"]').val();

                $.post( urlTarget.replace('+id+',id), {'_token': token}, function( response ) {
                    if(response.delete != null){
                        if( response.delete ){
                            alert(response.message);
                            $('.btn-delete[delete='+response.id+']').closest('tr').remove();
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
                <div class="card-header"><h3>{!! $title !!} <span class="badge badge-lg badge-info">{!! $productItens->count() !!}</span></h3></div>

                <div class="card-body">
                    
                    {!! Form::token() !!}
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">{!! $labelData !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $productItens as $key => $item )
                            <tr title="{!! $item->id !!}">
                                <th scope="row">{!! ($key+1) !!}</th>
                                <td>{!! $item->name !!}</td>
                                <td>{!! $item->manufacturer_name !!}</td>
                                <td>{!! $item->model !!}</td>
                                <td align="center">{!! $item->sku !!}</td>
                                <td align="center">{!! $item->amount !!}</td>
                                <td align="center">{!! $item->created_at->format("d/m/Y h:i") !!}</td>
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