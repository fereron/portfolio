<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('text');
            $table->string('slug')->unique()->index();
            $table->enum('status', [
                'Draft', 'Review', 'Published'
            ])->default('Draft');
            $table->string('image');
            $table->unsignedInteger('user_id');
//            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('cat_id');
//            $table->foreign('cat_id')->references('id')->on('categories');
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
        Schema::dropIfExists('articles');
    }
}
