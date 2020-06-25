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
            $table->string('empresa_cnpj')->nullable();
            $table->string('empresa_nome')->nullable();
            $table->string('empresa_responsavel')->nullable();
            $table->string('empresa_email')->nullable();
            $table->string('empresa_telefone')->nullable();
            $table->string('empresa_endereco')->nullable();

            $table->string('vaga_titulo')->nullable();
            $table->unsignedInteger('vaga_quantidade')->nullable();
            $table->text('vaga_descricao')->nullable();
            $table->string('vaga_salario')->nullable();
            $table->string('vaga_beneficios')->nullable();
            $table->string('vaga_jornada')->nullable();
            $table->string('vaga_endereco_trabalho')->nullable();
            $table->string('vaga_responsavel')->nullable();
            $table->string('vaga_contato_responsavel')->nullable();

            $table->string('candidato_experiencia')->nullable();
            $table->string('candidato_qtd_experiencia')->nullable();
            $table->string('candidato_escolaridade')->nullable();
            $table->string('candidato_pcd')->nullable();
            $table->string('candidato_deficiencia')->nullable();
            $table->string('candidato_cnh')->nullable();
            $table->string('candidato_cidades')->nullable();

            $table->string('entrevista_endereco')->nullable();
            $table->string('entrevista_datas')->nullable();
            $table->string('entrevista_horarios')->nullable();
            $table->unsignedInteger('entrevista_qtd_candidatos')->nullable();
            $table->unsignedInteger('entrevista_qtd_dia')->nullable();
            $table->unsignedInteger('entrevista_qtd_periodos')->nullable();
            $table->string('entrevista_selecionador')->nullable();
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
