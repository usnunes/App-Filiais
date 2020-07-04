@extends('layouts.app')
@section('content')
    <h1 class="h2 mb-2 text-gray-800" style="font-weight: 700;">FILIAIS<i class="fas fa-calendar-day" style="margin-left: 5px;"></i></h1>
    <div class="card shadow mb-4" style="margin-top: 15px;">
        <div class="card-header py-10">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-7 col-sm-5">
                    <h6 class="m-0 font-weight-bold text-primary">LISTA DE FILIAIS</h6>
                </div>
                <a href="{{route('filial.create')}}" class="btn btn-success btn-md active" role="button" aria-pressed="true">
                    <i class="fas fa-plus-square"></i>
                    <span style="margin-left: 5px; font-weight: 600;">NOVO CADASTRO</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>CIDADE</th>
                        <th>CNPJ</th>
                        <th>EMAIL</th>
                        <th>AÇÕES</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($filiais as $filial)
                        <tr>
                        <td>{{$filial->id}}</td>
                        <td>{{$filial->nome}}</td>
                        <td>{{$filial->cidade}}</td>
                        <td>{{$filial->cnpj}}</td>
                        <td>{{$filial->email}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('filial.edit', ['filial' => $filial->id])}}" class="btn btn-md btn-default"><i class="fas fa-edit" style="color: rgb(6, 130, 179);"></i></a>
                                <a href="{{route('filial.show', ['filial' => $filial->id])}}" class="btn btn-md btn-default"><i class="fas fa-eye" style="color: rgb(253, 123, 16);"></i></a>
                                <a href="{{route('filial.delete', ['filial' => $filial->id])}}" class="btn btn-md btn-default"><i class="far fa-trash-alt" style="color: rgb(235, 62, 19);"></i></button>
                            </div>
                        </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endsection
