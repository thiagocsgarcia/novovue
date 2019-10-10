<?php

use Faker\Generator as Faker;

$factory->define(App\InscricaoCurso::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'sexo' => $faker->randomElement(['Feminino', 'Masculino']),
        'estado_civil' => $faker->randomElement(['Solteiro (a)', 'Casado (a)', 'Separado (a)', 'Divorciado (a)', 'Viúvo (a)']),
        'dt_nascimento' => $faker->numerify('##/##/####'),
        'mae' => $faker->name,
        'pai' => $faker->name,
        'escolaridade' => $faker->randomElement(['Fundamental Incompleto', 'Fundamental', 'Médio Incompleto', 'Médio', 'Superior Incompleto', 'Superior']),
        'estrangeiro' => $faker->randomElement(['Sim', 'Não']),
        'deficiencia' => $faker->randomElement(['Não', 'Visual', 'Auditiva', 'Cognitiva', 'Física']),
        'endereco' => $faker->streetAddress,
        'email' => $faker->freeEmail,
        'celular' => $faker->numerify('(13) 9####-####'),
        'telefone' => $faker->numerify('(13) ####-####'),
        'cpf' => $faker->numerify('###.###.###-##'),
        'rg' => $faker->numerify('#########'),
        'curso_interesse' => $faker->text(),
    ];
});
