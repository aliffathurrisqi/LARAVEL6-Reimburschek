<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReimbesementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reimbesements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('person');
            $table->string('position');
            $table->string('penempatan');
            $table->date('reimbesement_date');
            $table->string('outlet_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reimbesements');
    }
}
