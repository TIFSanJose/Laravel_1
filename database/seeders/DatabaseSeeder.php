<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $curso = new Curso();
        $curso->name='laravel';
        $curso->descripcion='curso desde cero';
        $curso->sexo='0';
        $curso->save();

        $curso2 = new Curso();
        $curso2->name='javascript';
        $curso2->descripcion='curso nivel medio';
        $curso2->sexo='1';
        $curso2->save();

        $curso3 = new Curso();
        $curso3->name='.net';
        $curso3->descripcion='app en server';
        $curso3->sexo='0';
        $curso3->save();

    }
}
