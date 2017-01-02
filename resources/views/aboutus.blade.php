@extends('layouts.app2')
@section('title', 'Profil')
@section('content')
<h1 id="titre2"> Ce site à été réalisé avec amour par </h1>
<div class=personne>
<h2 class=nom> GRANDJEAN Rudy <h2>
<a href="https://github.com/RudyGr"><img class="reduite" src="{{ URL::asset('img/github.svg') }}" alt="github"/></a>
</div>
<div class=personne>
<h2 class=nom> RATH Benjamin <h2>
<a href="https://github.com/Kryze"><img class="reduite" src="{{ URL::asset('img/github.svg') }}" alt="github"/></a>
</div>
<div class=personne>
<h2 class=nom> LEGRIS Corentin <h2>
<a href="https://github.com/No0btower"><img class="reduite" src="{{ URL::asset('img/github.svg') }}" alt="github"/></a>
</div>
<div class=personne>
<h2 class=nom> BOURSIER Peter <h2>
<a href="https://github.com/PBoursier"><img class="reduite" src="{{ URL::asset('img/github.svg') }}" alt="github"/></a>
</div>

@endsection
