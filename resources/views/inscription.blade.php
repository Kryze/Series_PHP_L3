@extends('layouts.notlogged')
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
  <!-- Affiche les erreurs eventuels -->
	<?php echo "<p id=\"errins\">$message</p>"?>
    @parent
@endsection
