<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //
        $usuario = Role::create(['name'=>'Administrador']);
        $usuario->givePermissionTo(Permission::all());
        $usuario = User::create([
            'name' => 'SuperAdmin',
            'email' => 'amoreiras1990@yahoo.es',
            'password' => bcrypt('shiroums1990'),
            'active' => true
        ]);
        $usuario->givePermissionTo(Permission::all());

        // Estas lineas en caso de que no se haya creado el rol aun
        // $rol = Role::create(['name'=>'Administrador']);
        // $permisos = Permission::pluck('id','id')->all();
        // $rol->syncPermissions($permisos);
        // $usuario->assignRole([$rol->id]);
        
        
        // como ya el rol 'Administrador' esta creado:
        // $usuario->assignRole('Administrador');
        

    }
}
