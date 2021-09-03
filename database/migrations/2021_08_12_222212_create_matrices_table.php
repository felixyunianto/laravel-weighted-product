<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->char('alternative_code',4)->index();
            $table->char('criteria_code',4)->index();
            $table->bigInteger('value');
            $table->timestamps();

            $table->foreign('alternative_code')->references('alternative_code')->on('alternatives')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('criteria_code')->references('criteria_code')->on('criterias')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrices');
    }
}
