<!--/resources/views/students/show.blade.php -->

@extends('main')

@section('title', '| Uczniowie')

@section('content')

	
<h1>Student</h1>
<p>Imię i nazwisko: <?= $student->imie; ?> <?= $student->nazwisko; ?></p>
<p>Adres: <?= $student->adres; ?></p>
<p>Kod pocztowy: <?= $student->kod_pocztowy; ?></p>
<p>Miejscowość: <?= $student->miejscowosc; ?></p>
<p>Telefon: <?= $student->telefon; ?></p>

@endsection