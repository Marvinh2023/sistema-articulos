<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            [
                'titulo' => 'Smartphone Samsung Galaxy',
                'descripcion' => 'Último modelo con pantalla AMOLED y cámara de 108MP.',
                'precio' => 799.99,
                'condition_id' => 1,
                'category_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'titulo' => 'Silla de oficina ergonómica',
                'descripcion' => 'Silla cómoda con soporte lumbar ajustable.',
                'precio' => 150.00,
                'condition_id' => 2,
                'category_id' => 3, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
