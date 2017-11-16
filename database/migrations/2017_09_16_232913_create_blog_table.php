<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_blog', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->integer('admin_id');
            $table->integer('category_id');
            $table->string('blog_title');
            
            $table->text('short_description');
            $table->longText('long_description');
            $table->string('image',255);
            $table->tinyInteger('publication_status');
            $table->integer('hit_count');
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
        Schema::dropIfExists('tbl_blog');
    }
}
