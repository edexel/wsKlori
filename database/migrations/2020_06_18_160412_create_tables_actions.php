<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables_actions', function (Blueprint $table) {
            $table->id('idTableAction');
            $table->unsignedBigInteger('idTable')->nullable();
            $table->foreign('idTable')->references('idTable')->on('tables');
            $table->unsignedBigInteger('idAction')->nullable();
            $table->foreign('idAction')->references('idAction')->on('actions');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tables_actions');
    }
}
