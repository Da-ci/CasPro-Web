<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('argents', function (Blueprint $table) {
            $table->id();
            $table->string('salaireMarque');
            $table->string('salaireCaspro');
            $table->string('salaireCommercial');
            $table->boolean('soldeMarque')->default(0);
            $table->boolean('soldeCommercial')->default(0);
            $table->foreignId('commande_id')->constrained()->onDelete("cascade");
            $table->foreignId('user_id')->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('argents');
    }
}
