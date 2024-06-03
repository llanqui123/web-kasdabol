<?php

use Illuminate\Database\Seeder;
use App\Prediccion;

class PrediccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prediccion::create([
            'empresa_id'=>'1',
            'mantenimiento'=>'60',
        ]);
    }
}
