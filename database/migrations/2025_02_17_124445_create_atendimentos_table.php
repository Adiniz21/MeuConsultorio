<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('atendimentos', function (Blueprint $table) {
        $table->id();
        $table->dateTime('data_atendimento');
        $table->unsignedBigInteger('medico_id');
        $table->unsignedBigInteger('paciente_id');
        $table->timestamps();

        $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
        $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atendimentos');
    }
};
