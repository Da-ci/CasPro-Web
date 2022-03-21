<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableCommandesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained()->onDelete("cascade");;
            $table->foreignId('product_id')->constrained()->onDelete("cascade");
            $table->integer('quantity');
            $table->integer('price');
            $table->boolean('status')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */



    public function down()
    {
        Schema::dropIfExists('pivot_table_commandes_products');
    }
}
