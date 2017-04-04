@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- cuowuxingxi -->
@include('shared.errors')

<!-- ?????????? -->
<button type="button" class="btn btn-primary" style="margin-bottom:10px">Create album</button>

<!-- ???? -->
<!--???????????-->
<div class="row">
    @include('shared.album')
    @include('shared.album')
    @include('shared.album')
    @include('shared.album')
    @include('shared.album')
    @include('shared.album')
</div>
@endsection
