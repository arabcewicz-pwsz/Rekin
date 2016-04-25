<!-- resources/views/subjects/create.blade.php -->

@extends('main')

@section('title', '| Przedmioty')

@section('content')
 <div class="row">
        <div class="col-md-12">
          <h1>Dodaj Przedmiot</h1>
          <hr>
			<form method="POST" action="{{ action('SubjectController@store') }}">
			{!! csrf_field() !!}
			
            <div class="form-group">
              <label name="przedmiot">Nazwa Przedmiotu:</label>
			  <input type="text" name="przedmiot" value="{{ old('przedmiot') }}">
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
 


