<?php namespace Anurag\Gym\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAnuragGym extends Migration
{
    public function up()
    {
        Schema::create('anurag_gym_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('anurag_gym_');
    }
}
