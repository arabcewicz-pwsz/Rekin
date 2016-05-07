<!--/resources/views/subjects/show.blade.php -->

@extends('layouts.app')

@section('title', '| Przedmioty')

@section('content')

	
<h1>Subject</h1>
<p>Przedmiot: <?= $subject->przedmiot; ?></p>

@endsection