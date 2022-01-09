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
            $table->string('ad');
            $table->string('no')->unique();
            $table->string('soyad');
            $table->string('telefon');
            $table->string('sifre');
            $table->string('email');
            $table->string('adres');
            $table->string('tc');
            $table->string('image');
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
