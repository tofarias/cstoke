@extends('layouts.app')

@section('my_javascript_content')

    $(function(){
        $('#product_id').change(function(a){

            var optionSelected = $(this).find('option:selected').val();
                
            var id = $(this).attr('delete');
            var urlTarget = '{!! route("product.ajaxFindProduct") !!}';
            var token = $('[name="_token"]').val();

            $.post( urlTarget, {'_token': token, 'id': optionSelected}, function( response ) {
                
                if(response.success != null){
                    if( response.success == true ){
                        $('#manufacturer').val( response.manufacturer );
                        $('#model').val( response.model );
                        $('#sku').val( response.sku );
                    }
                }
            });
        });
    });
    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Adicionar Produto ao Estoque</div>

                <div class="card-body">
                    {!! Form::open(['route' => 'productin.insert']) !!}

                        <div class="form-group">
                            {!! Form::label('produto', 'Produto:', ['class' => '']) !!}
                            {!! Form::select('product_id', $products, null, ['id' => 'product_id','placeholder' => 'Selecione', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sku', 'SKU:', ['class' => '']) !!}
                            {!! Form::text('sku', '', ['id' => 'sku','class' => "form-control", 'readonly']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fabricante', 'Fabricante:', ['class' => '']) !!}
                            {!! Form::text('manufacturer', '', ['id' => 'manufacturer','class' => "form-control", 'readonly']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('modelo', 'Modelo:', ['class' => '']) !!}
                            {!! Form::text('model', '', ['id' => 'model','class' => "form-control", 'readonly']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('preco', 'Preço:', ['class' => '']) !!}
                            {!! Form::text('price', '', ['class' => "form-control", 'autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('peso', 'Peso:', ['class' => '']) !!}
                            {!! Form::text('weight', '', ['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('quantidade', 'Quantidade:', ['class' => '']) !!}
                            {!! Form::text('amount', '', ['class' => "form-control"]) !!}
                        </div>

                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
