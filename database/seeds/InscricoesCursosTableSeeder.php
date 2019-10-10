<?php

use Illuminate\Database\Seeder;

class InscricoesCursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\InscricaoCurso::class, 50)->create();
    }
}
