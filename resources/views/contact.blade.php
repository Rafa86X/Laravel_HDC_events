@extends('layouts.main')

@section('title', 'LaRaVel')

@section('content')

<h1>Contato!</h1>
<h2>{{ $nome }}</h2>
<h2>{{ $idade }}</h2>
<a href="/"> {{ $acao }}</a>

@endsection('content')