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

            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('customer_id');
                $table->string('service_file');
                $table->string('service_plate');
                $table->boolean('service_state');
                $table->string('province');
                $table->string('town')->nullable();
                $table->string('note');
                $table->text('description');
                $table->timestamps();

                //$table->foreign('customer_id')->references('id')->on('customers');
               // $table->foreign('id')->references('service_id')->on('customers');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
