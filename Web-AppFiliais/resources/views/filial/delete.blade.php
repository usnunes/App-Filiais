@extends('layouts.app')

@section('content')
        <h1 class="h2 mb-2 text-gray-800" style="font-weight: 700;">FILIAIS<i class="fas fa-calendar-day" style="margin-left: 5px;"></i></h1>
        <div class="card shadow mb-4" style="margin-top: 15px;">
            <div class="card-header py-10">
                <div class="row"></div>
                <h6 class="m-0 font-weight-bold text-primary">EXCLUIR CADASTRO</h6>
            </div>
            <form action="{{route('filial.destroy', ['filial' => $filial->id])}}" method="post">
                @method("DELETE")
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="nome" class="col-form-label">Nome <span style="color:red">*</span></label>
                            <input type="text" disabled required class="form-control" value="{{$filial->nome}}" name="nome" id="nome">
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="endereco" class="col-form-label">Endereço <span style="color:red">*</span></label>
                            <input type="text" disabled required class="form-control" value="{{$filial->endereco}}" name="endereco" id="endereco">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="cidade" class="col-form-label">Cidade <span style="color:red">*</span></label>
                            <input type="text" disabled required class="form-control" value="{{$filial->cidade}}" name="cidade" id="cidade">
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="cnpj" class="col-form-label">CNPJ <span style="color:red">*</span></label>
                            <input type="text" disabled required class="form-control" value="{{$filial->cnpj}}" name="cnpj" id="cnpj">
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="email" class="col-form-label">Email <span style="color:red">*</span></label>
                            <input type="email" disabled required class="form-control" value="{{$filial->email}}" name="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="latitude" class="col-form-label">Latitude <span style="color:red">*</span></label>
                            <input type="text" disabled required class="form-control" value="{{$filial->latitude}}" name="latitude" id="latitude">
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="longitude" class="col-form-label">Longitude <span style="color:red">*</span></label>
                            <input type="text" disabled required class="form-control" value="{{$filial->longitude}}" name="longitude" id="longitude">
                        </div>
                    </div>
                    <a href="{{route('filial.index')}}" id="cancel" name="cancel" class="btn btn-md btn-danger">CANCELAR</a>

                    <button type="submit" class="btn btn-md btn-success"><i class="far fa-trash-alt" style="color: rgb(255, 255, 255);"></i> EXCLUIR</button>
            </form>
            </div>
        </div>
    </div>
@endsection
