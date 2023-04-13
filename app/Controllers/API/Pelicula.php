<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;

class Pelicula extends ResourceController{ //se debe usar el resource controller para que pueda funcionar la rest api
    protected $modelName="App\Models\PeliculaModel"; //el nombre es importante y es de donde va a buscar el dato
    protected $format="json";

    public function index()
    {
        return $this->respond($this->model->findAll()); //devuelve todas las peliculas
    }
    public function show($id=null)
    {
        return $this->respond($this->model->find($id));
    }
    public function create()
    {
        if ($this->validate("peliculas")) {
            $id= $this->model->insert([
                "titulo"=>$this->request->getPost("titulo"),
                "descripcion"=>$this->request->getPost("descripcion"),
            ]);
        }else{
            return $this->respond($this->validator->getErrors(),400);
        }
       return $this->respond($id);
    }
    public function update($id=null)
    {
        if ($this->validate("peliculas")) { //comprueba la regla de validacion peliculas del archivo validation.php
            $this->model->update($id,[
                "titulo"=>$this->request->getRawInput()["titulo"], //se usa esto por que son peticiones de tipo patch o put no post
                "descripcion"=>$this->request->getRawInput()["descripcion"]
            ]);
    }else{
        return $this->respond($this->validator->getErrors(),400);
    }
}
public function delete ($id=null){
    $this->model->delete($id);
    return "ok";
}
}

?>