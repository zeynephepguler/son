<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KullanicilarTablo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanis', function (Blueprint $table) {
            $table->id();
            $table->string('ad')->nullable();
            $table->string('no')->unique();
            $table->string('soyad')->nullable();
            $table->string('telefon')->nullable();
            $table->string('sifre')->nullable();
            $table->string('email')->nullable();
            $table->string('adres')->nullable();
            $table->string('tc')->nullable();
            $table->string('image')->nullable();
            $table->string('sinifsec')->nullable();
            $table->string('tarih')->nullable();
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
        Schema::dropIfExists('Kullani');
    }
}
