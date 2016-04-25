@extends('main')
@section('content')

      <div class="row">
        <div class="col-md-12">
          <h1>Wyślij wiadomość</h1>
          <hr>
          <form>
            <div class="form-group">
              <label name="email">Email:</label>
              <input id="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label name="subject">Temat:</label>
              <input id="subject" name="subject" class="form-control">
            </div>

            <div class="form-group">
              <label name="message">Treść:</label>
              <textarea id="message" name="message" class="form-control">Type your message here...</textarea>
            </div>

            <input type="submit" value="Wyślj" class="btn btn-success">
          </form>
        </div>
      </div>

  @endsection