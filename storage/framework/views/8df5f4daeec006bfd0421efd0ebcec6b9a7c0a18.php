<?php $__env->startSection('content'); ?>
<div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>Aktualności</h1>
            <p class="lead">Tutaj będą wyświetlane najświerzsze wiadomości z życia Twojej szkoły, zdjęcia itd</p>
          </div>
        </div>
      </div>
      <!-- end of header .row -->
      <input type="button" value="Aktualizuj" class="btn btn-success">
    <?php $__env->stopSection(); ?>
    <!-- end of .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  </body>

</html>

<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>