<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        //geenran datos de prueba rapidamente
        $this->db->table("categorias")->where("id>=",1)->delete(); //borra todos los datos anteriores
        for ($i=0; $i <20 ; $i++) { 
            $this->db->table("categorias")->insert([
                "titulo"=>"Categoria".$i
            ]); //se puede poner una instancia del objeto model tambien esta hecho en peliculas de esta manera
        }
       
    }
}
