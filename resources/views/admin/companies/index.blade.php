 
@extends('layouts.meuapp')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body table-responsive">
                        <router-view name="listaEmpresas"></router-view>
                        <router-view></router-view>
                        <link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection