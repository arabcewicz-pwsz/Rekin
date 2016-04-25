<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('grades', function (Blueprint $table) {
		$table->increments('id');
		$table->string('grade_desc');
		$table->double('grade_value');
		$table->timestamps(); 
	});
	//Insert
	 DB::table('grades')->insert(
        array(
            'id' => '1',
            'grade_desc' => 'Niedostateczny',
			'grade_value' => '1.0'
        )
		
    );
	DB::table('grades')->insert(
        array(
            'id' => '2',
            'grade_desc' => 'Dopuszczający',
			'grade_value' => '2.0'
        )
		
    );
	DB::table('grades')->insert(
        array(
            'id' => '3',
            'grade_desc' => 'Dopuszczający+',
			'grade_value' => '2.5'
        )
		
    );
	DB::table('grades')->insert(
        array(
            'id' => '4',
            'grade_desc' => 'Dostateczny',
			'grade_value' => '3.0'
        )
		
    );
	DB::table('grades')->insert(
        array(
            'id' => '5',
            'grade_desc' => 'Dostateczny+',
			'grade_value' => '3.5'
        )
		
    );
	DB::table('grades')->insert(
        array(
            'id' => '6',
            'grade_desc' => 'Dobry',
			'grade_value' => '4.0'
        )
		
    );
	DB::table('grades')->insert(
        array(
            'id' => '7',
            'grade_desc' => 'Dobry+',
			'grade_value' => '4.5'
        )
		
    );
	DB::table('grades')->insert(
        array(
            'id' => '8',
            'grade_desc' => 'Bardzo Dobry',
			'grade_value' => '5.0'
        )
		
    );
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
