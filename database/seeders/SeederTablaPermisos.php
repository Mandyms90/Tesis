<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos = [
            // Administracion
            'administrar',
            //tabla usuarios 
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',            
            //tabla roles 
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',            
            //tabla carrucel 
            'ver-carrucel',
            'crear-carrucel',
            'editar-carrucel',
            'borrar-carrucel',            
            //tabla informes
            'ver-informe',
            'crear-informe',
            'editar-informe',
            'borrar-informe',
            //tabla boletines
            'ver-boletin',
            'crear-boletin',
            'editar-boletin',
            'borrar-boletin',
            //tabla noticias
            'ver-noticia',
            'crear-noticia',
            'editar-noticia',
            'borrar-noticia',       
            // tabla blogs
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',
        ];
        foreach ($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
