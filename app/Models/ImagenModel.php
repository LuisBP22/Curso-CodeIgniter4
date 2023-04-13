<?php

namespace App\Models;

use CodeIgniter\Model;

class ImagenModel extends Model
{
    protected $table            = 'imagenes';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ["imagen","extension","data"];

    public function getPeliculasById($id)
    {
        return 
        $this->select("i.*")->join("pelicula_imagen as pi","pi.pelicula_id=peliculas.id")->join("peliculas as p","p.id=pi.imagen_id")->where("p.id",$id)->findAll();
    }

}
