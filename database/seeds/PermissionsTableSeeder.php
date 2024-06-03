<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create([
            'name'=> 'Navegar usuarios',
            'slug'=>'users.index',
            'description'=>'Lista y navega por todos las usuarios del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creacion de usuarios',
            'slug'=>'users.create',
            'description'=>'Podria crear nuevos usuarios en el sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de usuario',
            'slug'=>'users.show',
            'description'=>'Ver en detalle cada usuario del sistema.',
        ]);
        Permission::create([
            'name'=> 'Edición de usuario',
            'slug'=>'users.edit',
            'description'=>'Podria editar cualquier dato de una usuario del sistema.',
        ]);
        Permission::create([
            'name'=> 'Eliminar usuario',
            'slug'=>'users.destroy',
            'description'=>'Eliminar cualquier dato de una usuario del sistema.',
        ]);



        Permission::create([
            'name'=> 'Navegar roles',
            'slug'=>'roles.index',
            'description'=>'Lista y navega por todos los roles del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creacion de roles',
            'slug'=>'roles.create',
            'description'=>'Podria crear nuevos roles en el sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de roles',
            'slug'=>'roles.show',
            'description'=>'Ver en detalle cada role del sistema.',
        ]);
        Permission::create([
            'name'=> 'Edición de roles',
            'slug'=>'roles.edit',
            'description'=>'Podria editar cualquier dato de un role del sistema.',
        ]);
        Permission::create([
            'name'=> 'Eliminar roles',
            'slug'=>'roles.destroy',
            'description'=>'Eliminar cualquier dato de un role del sistema.',
        ]);



        Permission::create([
            'name'=> 'Navegar categorias',
            'slug'=>'categorias.index',
            'description'=>'Lista y navega por todos las categorias del sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de categoria',
            'slug'=>'categorias.show',
            'description'=>'Ver en detalle cada categoria del sistema.',
        ]);
        Permission::create([
            'name'=> 'Edición de categorias',
            'slug'=>'categorias.edit',
            'description'=>'Editar cualquier dato de una categoria del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creación de categorias',
            'slug'=>'categorias.create',
            'description'=>'Crear cualquier dato de una categoria del sistema.',
        ]);
        Permission::create([
            'name'=> 'Eliminar categorias',
            'slug'=>'categorias.destroy',
            'description'=>'Eliminar cualquier dato de una categoria del sistema.',
        ]);



        Permission::create([
            'name'=> 'Navegar clientes',
            'slug'=>'clientes.index',
            'description'=>'Lista y navega por todos las clientes del sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de clientes',
            'slug'=>'clientes.show',
            'description'=>'Ver en detalle cada cliente del sistema.',
        ]);
        Permission::create([
            'name'=> 'Edición de clientes',
            'slug'=>'clientes.edit',
            'description'=>'Editar cualquier dato de una cliente del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creación de clientes',
            'slug'=>'clientes.create',
            'description'=>'Crear cualquier dato de una cliente del sistema.',
        ]);
        Permission::create([
            'name'=> 'Eliminar clientes',
            'slug'=>'clientes.destroy',
            'description'=>'Eliminar cualquier dato de una cliente del sistema.',
        ]);



        Permission::create([
            'name'=> 'Navegar productos',
            'slug'=>'productos.index',
            'description'=>'Lista y navega por todos las productos del sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de productos',
            'slug'=>'productos.show',
            'description'=>'Ver en detalle cada producto del sistema.',
        ]);
        Permission::create([
            'name'=> 'Edición de productos',
            'slug'=>'productos.edit',
            'description'=>'Editar cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creación de productos',
            'slug'=>'productos.create',
            'description'=>'Crear cualquier dato de un producto del sistema.',
        ]);
        Permission::create([
            'name'=> 'Eliminar productos',
            'slug'=>'productos.destroy',
            'description'=>'Eliminar cualquier dato de un producto del sistema.',
        ]);



        Permission::create([
            'name'=> 'Navegar proveedor',
            'slug'=>'proveedors.index',
            'description'=>'Lista y navega por todos los proveedores del sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalle de proveedor',
            'slug'=>'proveedors.show',
            'description'=>'Ver en detalle cada proveedor del sistema.',
        ]);
        Permission::create([
            'name'=> 'Edición de proveedores',
            'slug'=>'proveedors.edit',
            'description'=>'Editar cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creación de proveedores',
            'slug'=>'proveedors.create',
            'description'=>'Crear cualquier dato de un proveedor del sistema.',
        ]);
        Permission::create([
            'name'=> 'Eliminar proveedor',
            'slug'=>'proveedors.destroy',
            'description'=>'Eliminar cualquier dato de un proveedor del sistema.',
        ]);



        Permission::create([
            'name'=> 'Navegar por compras',
            'slug'=>'compras.index',
            'description'=>'Lista y navega por todos las compras del sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalles de compra',
            'slug'=>'compras.show',
            'description'=>'Ver en detalle cada compra del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creacion de compras',
            'slug'=>'compras.create',
            'description'=>'Crea cualquier dato de una compra del sistema.',
        ]);



        Permission::create([
            'name'=> 'Navegar por ventas',
            'slug'=>'ventas.index',
            'description'=>'Lista y navega por todos las ventas del sistema.',
        ]);
        Permission::create([
            'name'=> 'Ver detalles de venta',
            'slug'=>'ventas.show',
            'description'=>'Ver en detalle cada venta del sistema.',
        ]);
        Permission::create([
            'name'=> 'Creacion de ventas',
            'slug'=>'ventas.create',
            'description'=>'Crea cualquier dato de una venta del sistema.',
        ]);



        Permission::create([
            'name'=> 'Descargar PDF reporte de compra',
            'slug'=>'compras.pdf',
            'description'=>'Puede descargar todos los reportes de las compras en PDF.',
        ]);
        
        Permission::create([
            'name'=> 'Descargar PDF reporte de ventas',
            'slug'=>'ventas.pdf',
            'description'=>'Puede descargar todos los reportes de las ventas en PDF.',
        ]);

        Permission::create([
            'name'=> 'Subir archivo de compra',
            'slug'=>'upload.compras',
            'description'=>'Puede subir comprobantes de una compra.',
        ]);

        Permission::create([
            'name'=> 'Cambiar estado de producto',
            'slug'=>'cambiar.estado.productos',
            'description'=>'Permite cambiar el estado de un producto.',
        ]);
        Permission::create([
            'name'=> 'Cambiar estado de compra',
            'slug'=>'cambiar.estado.compras',
            'description'=>'Permite cambiar el estado de una compra.',
        ]);
        Permission::create([
            'name'=> 'Cambiar estado de venta',
            'slug'=>'cambiar.estado.ventas',
            'description'=>'Permite cambiar el estado de una venta.',
        ]);

        Permission::create([
            'name'=> 'Reporte por dia',
            'slug'=>'reporte.dia',
            'description'=>'Permite ver los reportes de ventas por dia.',
        ]);
        Permission::create([
            'name'=> 'Reporte por fechas',
            'slug'=>'reporte.fecha',
            'description'=>'Permite ver los reportes de ventas por un rango de fecha de las ventas.',
        ]);

        Permission::create([
            'name'=> 'Ver datos de la empresa.',
            'slug'=>'business.index',
            'description'=>'Navega por todos los datos de la empresa.',
        ]);
        Permission::create([
            'name'=> 'Edición de la empresa.',
            'slug'=>'business.edit',
            'description'=>'Editar cualquier dato de la empresa.',
        ]);
    }
}
