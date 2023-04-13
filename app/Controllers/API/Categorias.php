<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;

class Categorias extends ResourceController{
    protected $modelName="App\Models\CategoriasModel"; //el nombre es importante y es de donde va a buscar el dato
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
        if ($this->validate("categorias")) {
            $id= $this->model->insert([
                "titulo"=>$this->request->getPost("titulo")
            ]);
        }else{
            return $this->respond($this->validator->getErrors(),400);
        }
       return $this->respond($id);
    }
    public function update($id=null)
    {
        if ($this->validate("categorias")) { //comprueba la regla de validacion peliculas del archivo validation.php
            $this->model->update($id,[
                "titulo"=>$this->request->getRawInput()["titulo"], //se usa esto por que son peticiones de tipo patch o put no post
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