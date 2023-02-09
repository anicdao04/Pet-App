<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuchildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuchildren', function (Blueprint $table) {
            $table->id();
            $table->longText('category_id');
            $table->longText('name');
            $table->longText('image');
            $table->boolean('status_recipe')->default(0); //0=without recipe, 1=with recipe
            $table->boolean('status_availability')->default(1); //0=not available, 1=available
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
        Schema::dropIfExists('menuchildren');
    }
}
