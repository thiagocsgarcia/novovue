@extends('layouts.meuapp')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
