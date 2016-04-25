<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('students', function (Blueprint $table) {
		$table->increments('id');
		$table->string('imie');
		$table->string('nazwisko');
		$table->string('adres');
		$table->string('kod_pocztowy');
		$table->string('miejscowosc');
		$table->string('telefon');
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
