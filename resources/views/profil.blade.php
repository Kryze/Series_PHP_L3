@extends('layouts.app')
@section('title', 'Profil')
@section('content')
	<?php
	 echo "<div id=infos><h1 id=nomprofil>Bonjour, $user->name</h1>
		  <h2> Email : $user->email</div>";
	?>
@endsection
