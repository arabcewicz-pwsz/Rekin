<!-- resources/views/subjects/create.blade.php -->

@extends('layouts.app')

@section('title', '| Przedmiot')

@section('content')
 <div class="row">
        <div class="col-md-12">
          <h1>Edytuj Przedmiot</h1>
          <hr>
			<form method="POST" action="{{ action('SubjectController@edit', ['id' => $subject->id]) }}">
			<input name="_method" type="hidden" value="PATCH">
			{!! csrf_field() !!}
			
            <div class="form-group">
              <label name="przedmiot">Przedmiot:</label>
			  <input type="text" name="przedmiot" value="<?= $subject->imie; ?>">
            </div>
			
			<input type="submit" value="Aktualizuj" class="btn btn-success">
		  </form>
		  <form method="POST" action="{{ action('SubjectController@destroy', ['id' => $subject->id]) }}">
		<input name="_method" type="hidden" value="delete">
		{!! csrf_field() !!}

		<div>
		<input type="submit" value="Usuń przedmiot" class="btn btn-success">
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


