<?php

namespace App\Database\Seeds;

use App\Models\CategoriasModel;
use App\Models\PeliculaModel;
use CodeIgniter\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    public function run()
    {
        $peliculasModel=new PeliculaModel();
        $categoriaModel=new CategoriasModel();
        $categorias=$categoriaModel->limit(7)->findAll();
        $peliculasModel->where("id >=",1)->delete();
        foreach ($categorias as $categoria) {
        for ($i=0; $i <20 ; $i++) { 
            $peliculasModel->insert([
                "titulo"=>"Pelicula ".$i,
                "categoria_id"=>$categoria->id,
                "descripcion"=>"Descripcion ".$i
            ]);
        }
    }
}
}
