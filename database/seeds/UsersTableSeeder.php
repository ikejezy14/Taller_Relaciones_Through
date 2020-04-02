<?php

use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\Usuario;
use App\Models\Venta;
use App\Models\Tipo_Rol;
use App\Models\Producto;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Inicio relacion One to One
        $usuario = new App\Models\Usuario;
        $usuario->nombre ='Juana';
        $usuario->direccion ='cra 245';
        $usuario->telefono =2825696;
        $usuario->correo ='Juana@gmail.com';
        $usuario->save();
        
        $rol = new App\Models\Rol;
        $rol->nombre ='Admin';
        $usuario->rol()->save($rol);
        //Fin relacion One to One



        //Inicio relacion One to Many con saveMany
        $usuario2 = new App\Models\Usuario;
        $usuario2->nombre ='Jesus';
        $usuario2->direccion ='cra 51252';
        $usuario2->telefono =2825696;
        $usuario2->correo ='Jesus@gmail.com';
        $usuario2->save();

        $venta = new App\Models\Venta;
        $venta->num_venta =123;

        $venta2 = new App\Models\Venta;
        $venta2->num_venta =456;
        $usuario2->ventas()->saveMany([$venta,$venta2]);
        //Fin relacion One to Many con saveMany

        //SaveMany se usa para guardar varios modelos relacionados, en cambio createMany se usa para crear múltiples modelos relacionados
        //Inicio relacion One to Many con createMany
        $usuario3 = App\Models\Usuario::find(6);
        $usuario3->ventas()->createMany(
            [
                ['id'=>7 , 'num_venta'=>111],
                ['id'=>8 , 'num_venta'=>222],
                ['id'=>9 , 'num_venta'=>333],

            ]
        );
        //Fin relacion One to Many con createMany
            

        //Inicio relacion Many to Many
        Producto::create(['nombre'=>'arroz', 'precio'=>5000]);
        Producto::create(['nombre'=>'lenteja', 'precio'=>4000]);
        Producto::create(['nombre'=>'frijol', 'precio'=>3000]);
        //Attach sirve para guardar datos en una tabla intermedia. el sync se usa para guardar también en la tabla intermedia,
        // pero con la diferencia que este los actualiza y elimina los anteriores
        //Inicio Funcion attach
        $venta = App\Models\Venta::find(2);
        $venta-> productos()->attach([1,2,3]);
        //Fin Funcion attach

        //Inicio Funcion sync
        $venta2 = App\Models\Venta::find(2);
        $venta2-> productos()->sync([1]);
        //Fin Funcion sync
        //Fin relacion Many to Many
        
    }
}
