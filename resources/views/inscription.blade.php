@extends('layouts.test')
@section('head')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection
@section('bodyaccueil')
@endsection
@section('inscription')
    @parent
@endsection
@section('footer')
	<?php echo "<p id=\"errins\">$message</p>"?>
    @parent
@endsection
