<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables_columns', function (Blueprint $table) {
            $table->id('idTableColumn');
            $table->unsignedBigInteger('idTable')->nullable();
            $table->foreign('idTable')->references('idTable')->on('tables');
            $table->string('column');
            $table->boolean('visible');
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
        Schema::dropIfExists('tables_columns');
    }
}
