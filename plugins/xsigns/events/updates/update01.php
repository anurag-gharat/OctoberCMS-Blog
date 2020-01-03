<?php namespace  Xsigns\events\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Update01EventsTable extends Migration
{

    public function up()
    {
        Schema::table('xsigns_events', function ($table) {
            $table->time('timefrom')->nullable()->change();
            $table->time('timeto')->nullable()->change();
            $table->text('text')->nullable()->change();
            $table->text('city')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('xsigns_events', function ($table) {
            $table->time('timefrom')->nullable(false)->change();
            $table->time('timeto')->nullable(false)->change();
            $table->text('text')->nullable(false)->change();
            $table->text('city')->nullable(false)->change();
        });
    }

}
