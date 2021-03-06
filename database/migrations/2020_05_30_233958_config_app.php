<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConfigApp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_app', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('logo', 255);
            $table->mediumText('terminos');
            $table->string('archivo', 255);
            $table->string('correo', 30);
            $table->integer('telefono');
            $table->string('tokenApp', 100);
            $table->timestamp('created_at', 0);
            $table->timestamp('updated_at', 0);
            $table->timestamp('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_app');
    }
}
