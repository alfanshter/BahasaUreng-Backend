<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_pilihan_gandas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pilihanganda')->references('id')->on('pilihan_gandas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jawaban');
            $table->integer('is_true')->default(0);
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
        Schema::dropIfExists('jawaban_pilihan_gandas');
    }
};
