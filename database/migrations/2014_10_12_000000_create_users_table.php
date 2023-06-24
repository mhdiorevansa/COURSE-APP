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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user')->nullable(false);
            $table->string('username', 20)->nullable(false);
            $table->string('email', 50)->unique()->nullable(false);
            $table->string('password', 50)->nullable(false);
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable(true);
            $table->string('gambar', 150)->nullable(true);
            $table->string('bio', 100)->nullable(true);
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
};
