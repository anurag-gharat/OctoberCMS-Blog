<?php namespace Anurag\Updates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAnuragUpdates extends Migration
{
    public function up()
    {
        Schema::create('anurag_updates_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('title');
            $table->text('description');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('anurag_updates_');
    }
}
