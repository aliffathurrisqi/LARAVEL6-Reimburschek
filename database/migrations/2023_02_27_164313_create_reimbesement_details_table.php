<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReimbesementDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('reimbesement_details', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->text('keterangan');
        //     $table->decimal('nominal', 20, 2);
        //     $table->text('image')->nullable();
        //     $table->integer('reimbesement_id');
        //     $table->timestamps();
        //     $table->softDeletes();
        // });

        Schema::create('reimbesement_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('berangkat');
            $table->decimal('nominal_1', 20, 2);
            $table->text('image_1')->nullable();
            $table->text('pulang');
            $table->decimal('nominal_2', 20, 2);
            $table->text('image_2')->nullable();
            $table->text('makan');
            $table->decimal('nominal_3', 20, 2);
            $table->text('image_3')->nullable();
            $table->decimal('total', 20, 2);
            $table->integer('reimbesement_id');
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
        Schema::dropIfExists('reimbesement_details');
    }
}
