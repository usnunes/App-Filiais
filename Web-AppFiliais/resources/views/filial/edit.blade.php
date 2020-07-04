@extends('layouts.app')

@section('content')
        <h1 class="h2 mb-2 text-gray-800" style="font-weight: 700;">FILIAIS<i class="fas fa-calendar-day" style="margin-left: 5px;"></i></h1>
        <div class="card shadow mb-4" style="margin-top: 15px;">
            <div class="card-header py-10">
                <div class="row"></div>
                <h6 class="m-0 font-weight-bold text-primary">EDITAR CADASTRO</h6>
            </div>
            <div class="card-body">
                <form action="{{route('filial.update', ['filial' => $filial->id])}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="nome" class="col-form-label">Nome <span style="color:red">*</span></label>
                            <input type="text" required class="form-control @error('nome') is-invalid @enderror" value="{{$filial->nome}}" name="nome" id="nome">
                            @error('nome')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="endereco" class="col-form-label">Endereço <span style="color:red">*</span></label>
                            <input type="text" required class="form-control @error('endereco') is-invalid @enderror" value="{{$filial->endereco}}" name="endereco" id="endereco">
                            @error('endereco')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="cidade" class="col-form-label">Cidade <span style="color:red">*</span></label>
                            <input type="text" required class="form-control @error('cidade') is-invalid @enderror" value="{{$filial->cidade}}" name="cidade" id="cidade">
                            @error('cidade')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="cnpj" class="col-form-label">CNPJ <span style="color:red">*</span></label>
                            <input type="text" required class="form-control @error('cnpj') is-invalid @enderror" value="{{$filial->cnpj}}" name="cnpj" id="cnpj">
                            @error('cnpj')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="email" class="col-form-label">Email <span style="color:red">*</span></label>
                            <input type="email" required class="form-control @error('email') is-invalid @enderror" value="{{$filial->email}}" name="email" id="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="latitude" class="col-form-label">Latitude <span style="color:red">*</span></label>
                            <input type="text" required class="form-control @error('latitude') is-invalid @enderror" value="{{$filial->latitude}}" name="latitude" id="latitude">
                            @error('latitude')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-sm-12">
                            <label for="longitude" class="col-form-label">Longitude <span style="color:red">*</span></label>
                            <input type="text" required class="form-control @error('longitude') is-invalid @enderror" value="{{$filial->longitude}}" name="longitude" id="longitude">
                            @error('longitude')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <a href="{{route('filial.index')}}" id="cancel" name="cancel" class="btn btn-md btn-danger">CANCELAR</a>
                    <button type="submit" class="btn btn-md btn-success">SALVAR</button>
                </form>
            </div>
        </div>
    </div>
@endsection
