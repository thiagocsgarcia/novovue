<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCadCicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cad_cic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->string('sexo')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('dt_nascimento')->nullable();
            $table->string('mae')->nullable();
            $table->string('pai')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('estrangeiro')->nullable();
            $table->string('deficiencia')->nullable();
            $table->string('endereco')->nullable();
            $table->string('email')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefone')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('curso_interesse')->nullable();
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
        Schema::dropIfExists('cad_cic');
    }
}
