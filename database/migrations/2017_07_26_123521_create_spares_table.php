<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spares', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->string('code')->unique()->index();
            $t->string('brand');
            $t->string('image')->nullable();
//            $t->unsignedInteger('category_id');
//            $t->unsignedInteger('type_id')->nullable();
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spares');
    }
}
