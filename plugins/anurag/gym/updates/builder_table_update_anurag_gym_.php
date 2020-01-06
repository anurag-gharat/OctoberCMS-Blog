<?php namespace Anurag\Gym\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateAnuragGym extends Migration
{
    public function up()
    {
        Schema::table('anurag_gym_', function($table)
        {
            $table->string('title');
            $table->text('description');
        });
    }
    
    public function down()
    {
        Schema::table('anurag_gym_', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
    }
}
