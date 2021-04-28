<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name', 30);
            $table->date('date_of_birth');
            $table->mediumText('description')->nullable();
            $table->string('image1', 256)->nullable();
            $table->string('image2', 256)->nullable();
            $table->string('image3', 256)->nullable();
            $table->enum('available',['yes', 'no'])->default('yes');
            $table->enum('type_of_animal',['Dog', 'Cat', 'Rabbit', 'Snake', 'Salamander', 'other'])->default('other');
            $table->enum('species',['mammals', 'fish', 'birds', 'reptiles', 'amphibians', 'other'])->default('other');
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
        Schema::dropIfExists('animals');
    }
}
