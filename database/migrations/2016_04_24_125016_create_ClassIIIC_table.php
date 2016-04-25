<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlasaIIICTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('KlasaIIIC', function (Blueprint $table) {
		$table->increments('id');
		$table->string('id_wychowawca');
		$table->string('id_student');
		$table->timestamps(); 
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}