<?php
namespace Xsigns\events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('xsigns_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->time('timefrom');
            $table->time('timeto');
            $table->integer('user')->default(0);
            $table->string('title', 250);
            $table->text('text');
            $table->text('short');
            $table->string('city',250);
            $table->string('alias',250);
            $table->boolean('public')->default(1);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('xsigns_events');
    }
}
