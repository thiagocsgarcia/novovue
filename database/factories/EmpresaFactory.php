<?php

use Faker\Generator as Faker;

$factory->define(App\Empresa::class, function (Faker $faker) {
    return [
        'status' => 0,
        'nome_fantasia' => $faker->firstName,
        'razao_social' => $faker->lastName,
        'cnpj' => $faker->numerify('##.###.###/####-##'),
        'ie' => $faker->numerify('#.####'),
        'im' => $faker->numerify('##.##'),
        'contato' => $faker->name,
        'telefone' => $faker->phoneNumber,
        'telefone2' => $faker->phoneNumber,
        'celular' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'endereco' => $faker->streetAddress,
        'bairro' => $faker->word,
        'cidade' => $faker->city,
        'cep' => $faker->postcode,
        'ramo_atividade' => $faker->jobTitle,
        'porte' => $faker->randomElement(['pequeno','médio', 'grande']),
        'observacao' => $faker->text(),
        'status' => 0,
    ];
});
