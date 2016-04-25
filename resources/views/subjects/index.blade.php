<!--/resources/views/subjects/index.blade.php -->

@extends('main')

@section('title', '| Przedmioty')

@section('content')


 <div class="row">
 <div class="col-md-12">	
<div><a href="{{ action('SubjectController@create') }}">Dodaj Przedmiot</a></div>
<h1>Lista Przedmiotów</h1>
 <hr>
@foreach ($subjects as $subject)
	<div>
    		<h2>{{ $subject->przedmiot }} </h2>
   		<a href="{{ action('SubjectController@edit', ['id' => $subject->id]) }}">Edytuj</a>
	</div>
@endforeach
</div>
</div>
@endsection
 