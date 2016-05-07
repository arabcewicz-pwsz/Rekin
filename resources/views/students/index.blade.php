<!--/resources/views/students/index.blade.php -->

@extends('layouts.app')

@section('title', '| Uczniowie')

@section('content')

	
<div><a href="{{ action('StudentController@create') }}">Dodaj Ucznia</a></div>
<h1>Lista Uczniów</h1>
 <hr>
 
@foreach ($students as $student)
	<div>
    		<h2>{{ $student->imie }} {{ $student->nazwisko }}</h2>
    		<p>{{ $student->miejscowosc }} {{ $student->telefon }}</p>
    		<a href="{{ action('StudentController@edit', ['id' => $student->id]) }}">Edytuj</a>
	</div>
@endforeach

@endsection
 