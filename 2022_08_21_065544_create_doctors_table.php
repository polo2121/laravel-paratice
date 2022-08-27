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
        Schema::create('m_doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('doc_name');
            $table->string('doc_specialist');
            $table->string('doc_days');
            $table->string('doc_times');
            $table->string('doc_profile');
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
        Schema::dropIfExists('doctors');
    }
};
