<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Verify Type
            $table->string('email')->nullable()->unique(); //Verify Type
            $table->string('password'); //Verify Type
            $table->string('phone')->nullable(); //Verify Type
            $table->enum('type', ['Admin', 'Marque', 'Commercial']);
            $table->integer('pourcentageCaspro')->nullable();
            $table->string('RC')->nullable();
            $table->string('NIF')->nullable();
            $table->string('NIS')->nullable();
            $table->string('AI')->nullable();
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
        Schema::dropIfExists('users');
    }
}
