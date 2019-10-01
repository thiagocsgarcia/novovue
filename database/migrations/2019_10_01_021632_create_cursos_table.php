<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes_cursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('nome');
            $table->string('cpf');
            $table->string('rg');
            $table->string('sexo');
            $table->string('mae');
            $table->string('pai');
            $table->string('estado_civil');
            $table->string('data_nascimento');
            $table->string('endereco');
            $table->string('celular');
            $table->string('telefone');
            $table->string('escolaridade');
            $table->string('curso_interesse');
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
        Schema::dropIfExists('inscricoes_cursos');
    }
}
