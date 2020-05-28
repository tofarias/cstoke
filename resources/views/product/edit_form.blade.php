@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Produto</div>

                <div class="card-body">
                    {!! Form::model($product, ['route' => ['product.update', ['id' => $product->id]]]) !!}
                        <div class="form-group">
                            {!! Form::label('nome', 'Nome:', ['class' => '']) !!}
                            {!! Form::text('name', null, ['class' => "form-control", 'autofocus']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('modelo', 'Modelo:', ['class' => '']) !!}
                            {!! Form::text('model', null, ['class' => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('descricao', 'Descrição:', ['class' => '']) !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'decricao', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('categoria', 'Categoria:', ['class' => '']) !!}
                            {!! Form::select('category_id', $categories, null, ['placeholder' => 'Selecione', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fabricante', 'Fabricante:', ['class' => '']) !!}
                            {!! Form::select('manufacturer_id', $manufacturers, null, ['placeholder' => 'Selecione', 'class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
