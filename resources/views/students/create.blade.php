<!-- resources/views/students/create.blade.php -->

@extends('layouts.app')

@section('title', '| Uczniowie')

@section('content')
 <div class="row">
        <div class="col-md-12">
          <h1>Dodaj Ucznia</h1>
          <hr>
			<form method="POST" action="{{ action('StudentController@store') }}">
			{!! csrf_field() !!}
			
            <div class="form-group">
              <label name="imie">imię:</label>
			  <input type="text" name="imie" value="{{ old('imie') }}">
            </div>
			
            <div class="form-group">
              <label name="nazwisko">nazwisko:</label>
			  <input type="text" name="nazwisko" value="{{ old('imie') }}">
            </div>
			
			<div class="form-group">
              <label name="adres">adres:</label>
			  <input type="text" name="adres" value="{{ old('adres') }}">
            </div>
			
			<div class="form-group">
              <label name="kod_pocztowy">kod pocztowy:</label>
			  <input type="text" name="kod_pocztowy" value="{{ old('kod_pocztowy') }}">
            </div>

			<div class="form-group">
              <label name="miejscowosc">miejscowosc:</label>
			  <input type="text" name="miejscowosc" value="{{ old('miejscowosc') }}">
            </div>
			
			<div class="form-group">
              <label name="telefon">telefon:</label>
			  <input type="text" name="telefon" value="{{ old('telefon') }}">
            </div>
			
			<input type="submit" value="Dodaj" class="btn btn-success">

		  </form>
        </div>
      </div>
@if (count($errors) > 0)
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@endsection
 


