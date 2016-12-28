@extends('layouts.test')
@section('head')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection
@section('bodyaccueil')
@endsection
@section('message')
<div class="row">
  <div class="col-lg-9 col-md-9 block">
    <p> {{ $message }} </p>
  </div
</div>
@endsection
@section('inscription')
    @parent
@endsection
@section('footer')
    @parent
@endsection
