<?php namespace Anurag\Posts\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateAnuragPosts extends Migration
{
    public function up()
    {
        Schema::create('anurag_posts_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->timestamp('created_at');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('anurag_posts_');
    }
}
