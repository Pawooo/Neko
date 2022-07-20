<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nekos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tags');
            $table->date('dob'); //returns a string '1979-06-09' //Date of birth　SELECT TIMESTAMPDIFF(YEAR, '1993-10-01' ,NOW()) AS age_in_whole_years
            $table->longText('desc');
            $table->string('img');
            $table->string('palate')->nullable();
            $table->boolean('vaccines')->nullable();            
            $table->string('location')->nullable();            
            $table->string('breed')->nullable(); //Predefined autocomplete dropdown?           
            $table->string('purrsound')->nullable();            
            $table->timestamps();  
            // $table->dateTimeTz('created_at', 0);
            // $table->softDeletesTz('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nekos');
    }
};
