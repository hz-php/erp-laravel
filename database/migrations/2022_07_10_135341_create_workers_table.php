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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle_name');
            $table->string('surname');
            $table->date('birthday');
            $table->string('phone');
            $table->string('male');
            $table->string('specialization');

            $table->string('ser_pasp');
            $table->string('num_pasp');
            $table->string('nat_pasp');
            $table->date('date_pasp');
            $table->string('who_pasp');

            $table->string('city');

            $table->string('scan_one');
            $table->string('scan_two')->nullable(true);
            $table->string('scan_three')->nullable(true);
            $table->string('created_by_whom')->nullable(false);


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
        Schema::dropIfExists('workers');
    }
};
