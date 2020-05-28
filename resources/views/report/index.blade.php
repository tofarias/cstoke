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
                <div class="card-header"><h3>{!! $title !!} <span class="badge badge-lg badge-info">{!! $total !!}</span></h3></div>

                <div class="card-body">

                    <div class="container">
                        <div class="row justify-content-md-center">
                            {!! $products->links() !!}
                        </div>
                    </div>
                    
                    {!! Form::token() !!}
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Fabricante</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Dt. Entrada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $products as $key => $productIn )
                            <tr title="{!! $productIn->id !!}">
                                <th scope="row">{!! ($key+1) !!}</th>
                                <td>{!! $productIn->product->name !!}</td>
                                <td>{!! $productIn->product->manufacturer->name !!}</td>
                                <td>{!! $productIn->product->model !!}</td>
                                <td align="center">{!! $productIn->created_at->format("d/m/Y h:i") !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="container">
                        <div class="row justify-content-md-center">
                            {!! $products->links() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection