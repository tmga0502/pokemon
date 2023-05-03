<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('number')->comment('図鑑ナンバー');
            $table->string('name')->comment('名前');
            $table->string('image_path')->comment('画像パス');
            $table->string('classification')->comment('分類');
            $table->integer('height')->comment('高さ');
            $table->integer('weight')->comment('重さ');
            $table->string('characteristic')->comment('特性');
            $table->integer('hp')->comment('HP');
            $table->integer('attack')->comment('攻撃');
            $table->integer('defense')->comment('防御');
            $table->integer('special_attack')->comment('特攻');
            $table->integer('special_defense')->comment('特防');
            $table->integer('speed')->comment('すばやさ');
            $table->text('description')->comment('紹介文');
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
        Schema::dropIfExists('pokemon');
    }
}
