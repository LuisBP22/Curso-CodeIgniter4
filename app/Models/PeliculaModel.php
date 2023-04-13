<?php

namespace App\Models;

use CodeIgniter\Model;

class PeliculaModel extends Model
{
    protected $table = 'peliculas';
    protected $returnType="object"; //se puede cambiar por array
    protected $primaryKey="id";
    protected $allowedFields=["titulo", "descripcion","categoria_id"];   

    public function getImagesById($id)
    {
        return 
        $this->select("i.*")->join("pelicula_imagen as pi","pi.pelicula_id=peliculas.id")->join("imagenes as i","i.id=pi.imagen_id")->where("peliculas.id",$id)->findAll();
    }
}
