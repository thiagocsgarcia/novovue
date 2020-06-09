<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('empresa_id');
            $table->string('vaga');
            $table->text('descricao');
            $table->unsignedInteger('quantidade');
            $table->string('responsavel');
            $table->string('telefone');
            $table->string('experiencia');
            $table->string('qtd_experiencia')->nullable();
            $table->string('escolaridade');
            $table->string('pcd');
            $table->string('deficiencia')->nullable();
            $table->string('cnh');
            $table->string('salario');
            $table->string('beneficios');
            $table->string('jornada');
            $table->string('endereco_trabalho');
            $table->string('cidades');
            $table->unsignedInteger('qtd_candidatos');
            $table->string('endereco_entrevista');
            $table->string('dias_entrevista');
            $table->string('horarios_entrevista');
            $table->unsignedInteger('qtd_candidatos_dias');
            $table->unsignedInteger('qtd_candidatos_periodo');
            $table->string('selecionador');
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
        Schema::dropIfExists('vagas');
    }
}
