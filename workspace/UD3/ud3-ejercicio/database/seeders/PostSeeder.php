<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->insert([
            [
                'usuario_id' => 1,
                'titulo' => 'Historia de la Biologia',
                'contenido' => 'Un repaso de la biologia durante todos sus periodos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 1,
                'titulo' => 'Historia de las Matematicas',
                'contenido' => 'Un repaso de la matematicas durante todos sus periodos en la historia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'usuario_id' => 2,
                'titulo' => 'Literatura clásica',
                'contenido' => 'Un repaso por los clásicos de la literatura universal.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

