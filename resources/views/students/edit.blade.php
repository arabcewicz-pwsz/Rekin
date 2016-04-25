<!-- resources/views/students/create.blade.php -->

@extends('main')

@section('title', '| Uczniowie')

@section('content')
 <div class="row">
        <div class="col-md-12">
          <h1>Edytuj Ucznia</h1>
          <hr>
			<form method="POST" action="{{ action('StudentController@edit', ['id' => $student->id]) }}">
			<input name="_method" type="hidden" value="PATCH">
			{!! csrf_field() !!}
			
            <div class="form-group">
              <label name="imie">imię:</label>
			  <input type="text" name="imie" value="<?= $student->imie; ?>">
            </div>
			
            <div class="form-group">
              <label name="nazwisko">nazwisko:</label>
			  <input type="text" name="nazwisko" value="<?= $student->nazwisko; ?>">
            </div>
			
			<div class="form-group">
              <label name="adres">adres:</label>
			  <input type="text" name="adres" value="<?= $student->adres; ?>">
            </div>
			
			<div class="form-group">
              <label name="kod_pocztowy">kod pocztowy:</label>
			  <input type="text" name="kod_pocztowy" value="<?= $student->kod_pocztowy; ?>">
            </div>

			<div class="form-group">
              <label name="miejscowosc">miejscowosc:</label>
			  <input type="text" name="miejscowosc" value="<?= $student->miejscowosc; ?>">
            </div>
			
			<div class="form-group">
              <label name="telefon">telefon:</label>
			  <input type="text" name="telefon" value="<?= $student->telefon; ?>">
            </div>
			
			<input type="submit" value="Aktualizuj" class="btn btn-success">
		  </form>
		  <form method="POST" action="{{ action('StudentController@destroy', ['id' => $student->id]) }}">
		<input name="_method" type="hidden" value="delete">
		{!! csrf_field() !!}

		<div>
		<input type="submit" value="Usuń ucznia" class="btn btn-success">
		</div>
		</form>
        </div>
      </div>

@if ($errors->any())
	<ul class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

@endsection


