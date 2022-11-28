<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptionRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoption_requests', function (Blueprint $table) {
            $table->id();
            $table->string('adopt_name');
            $table->string('adopt_address');
            $table->string('adopt_contact');
            $table->string('adopt_email');
            $table->longText('message');
            $table->string('pet_id');
            $table->string('pet_name');
            $table->string('pet_category');
            $table->string('pet_breed');
            $table->string('pet_age');
            $table->string('pet_img');
            $table->boolean('status')->default(0);
            $table->date('date_created');
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
        Schema::dropIfExists('adoption_requests');
    }
}
