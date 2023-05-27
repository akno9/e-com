<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('nom');
            $table->mediumText('mini_desc');
            $table->longText('description');
            $table->string('prix_orig');
            $table->string('prix_vente');
            $table->string('image');
            $table->string('qte');
            $table->string('taxe');
            $table->tinyInteger('statut')->default('0');
            $table->tinyInteger('populaire')->default('0');
            $table->string('meta_titre');
            $table->string('meta_desc');
            $table->string('meta_motCle');
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
        Schema::dropIfExists('products');
    }
}
