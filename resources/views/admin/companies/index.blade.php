 
@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading alert alert-success">
                        <h2><business w="40px" h="40px"></business> Empresas</h2>
                    </div>
                    <div class="panel-body table-responsive">
                        <router-view name="companiesIndex"></router-view>
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection