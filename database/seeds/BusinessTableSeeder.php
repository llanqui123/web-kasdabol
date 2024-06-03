<?php

use Illuminate\Database\Seeder;
use App\Business;


class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([
            'nombre'=>'Nombre de la empresa.',
            'descripcion'=>'Descripcion corta de la empresa.',
            'logo'=>'logo.png',
            'mail'=>'Ejemplo@gmail.com',
            'direccion'=>'8888 Villa Dela Apt. 101, calle morroy',
            'ruc'=>'15247895632',
            'costo_pedido'=>'60',
            'mantenimiento'=>'150',
        ]);
    }
}
