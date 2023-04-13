<?php 
namespace App\Controllers;

use App\Database\Migrations\PeliculaImagen;
use App\Models\CategoriasModel;
use App\Models\EtiquetaModel;
use App\Models\EtiquetaPeliculaModel;
use App\Models\ImagenModel;
use App\Models\PeliculaImagenModel;
use App\Models\PeliculaModel;
use CodeIgniter\HTTP\Files\UploadedFile;
class Pelicula extends BaseController {

    public function index(){
      // es un metodo del helper de date establecido en el archivo Base Controller echo now();
        $peliculas=new PeliculaModel(); //instancias individuales de la clase
        $data=[
           //tenemos esto para que salgan todos en una sola pagina
           // "peliculas"=>$peliculas->select("peliculas.*, categorias.titulo as categoria")->join("categorias","categorias.id=peliculas.categoria_id")->find()
           // o esto que lo pagina
           "peliculas"=>$peliculas->select("peliculas.*, categorias.titulo as categoria")->join("categorias","categorias.id=peliculas.categoria_id")->paginate(10),
           "pager"=>$peliculas->pager
        ];
        //$this->generarimagen();

       /* asi estaba antes return view("index.php", 
        ["test"=>$peliculas->findAll()] //devuleve todos los registros y test se convierte en una variable que se puede usar en la vista
        );*/
        return view("index.php", $data);
    }
 
    private function asignarimagen($peliculaId)
    {
        helper("filesystem"); //es para lo de json encode de abajo
        if ($imagefile=$this->request->getFile(("imagen"))) { //campo del formulario
             if ($imagefile->isValid() && !$imagefile->hasMoved()) {
                $imageNombre = $imagefile->getName();
                $ext = $imagefile->guessExtension();
                $imagefile->move("../public/uploads/peliculas");
                $imagenModel=new ImagenModel();
                $imagenid= $imagenModel->insert([
                    "imagen"=>$imageNombre,
                    "extension"=>$ext,
                    "data"=>json_encode(get_file_info("../public/uploads/peliculas/$imageNombre"))
                ]);
                //esto da un poco igual
                $peliculaImagenModel=new PeliculaImagenModel();
                $peliculaImagenModel->insert([
                        "imagen_id"=>$imagenid,
                        "pelicula_id"=>$peliculaId
                ]);
                return $this->validator->listErrors();
             }
        }
    }
    public function descargarimagen($imageId){
        $imagenModel=new ImagenModel();
        $imagen=$imagenModel->find($imageId);
        if ($imagen==null) {
            return "no existe esa imagen";
        }
        return $this->response->download("uploads/peliculas/".$imagen->imagen,null)->setFileName("imagen.png");
    }
    public function borrarimagen($imageId){
        $imagenModel=new ImagenModel();
        $peliculaImagenModel=new PeliculaImagenModel();
        $peliculaImagenModel->where("imagen_id",$imageId)->delete(); //este no importa por que es de la relacion esa extraña
        $imagen=$imagenModel->find($imageId);
        if ($imagen==null) {
            return "no existe esa imagen";
        }
        $ruta="uploads/peliculas/".$imagen->imagen;
        unlink($ruta); //borra de la carpeta que le pasamos
        $imagenModel->delete($imageId); //esto es para borrarlo de la bdat
        return redirect()->back()->with("mensaje", "Imagen Eliminada exitosamente");
    }
 
    public function new(){
        $categoriaModel=new CategoriasModel();
        return view("new.php",[
            "categoria"=>$categoriaModel->find() //pasa todas las categorias a la vista de new
        ]);
    }
    public function create(){
        $peliculas=new PeliculaModel();
        if ($this->validate("peliculas")) {
        $peliculas->insert([
            "titulo"=>$this->request->getPost("titulo"), //es lo mismo que hacer $POST["titulo];
            "descripcion"=>$this->request->getPost("descripcion"),
            "categoria_id"=>$this->request->getPost("categoria_id")
        ]);
    }else{
        session()->setFlashdata([
            "error"=>$this->validator->listErrors() //error es la variable de la sesion
        ]);
        return redirect()->back()->withInput();
    }
     return redirect()->route("dashboard/pelicula");
    }
    public function show($id){
        $peliculas=new PeliculaModel(); 
         //instancias individuales de la clase
        return view("show.php",
        ["data"=>$peliculas->find($id),
         "imagenes"=>$peliculas->getImagesById($id)
        ] //utiliza el metodo find con el id que se le pasa en la ruta para encontrar ese registro
    );
    }
    public function edit($id){
        $peliculas=new PeliculaModel();  //instancias individuales de la clase
        $categoriaModel=new CategoriasModel();
        echo view("edit", [
            "peliculas"=>$peliculas->find($id),
            "categoria_id"=>$categoriaModel->find(),
        ]); 
    }
    public function update($id){
        $peliculas=new PeliculaModel();
        if ($this->validate("peliculas")) { //comprueba la regla de validacion peliculas del archivo validation.php
            $peliculas->update($id,[
                "titulo"=>$this->request->getPost("titulo"),
                "descripcion"=>$this->request->getPost("descripcion"),
                "categoria_id"=>$this->request->getPost("categoria_id")
            ]);
            $this->asignarimagen($id);
            return redirect()->route(("dashboard/pelicula"))->with("mensaje","Actualizado Exitosamente");
        }else {
            session()->setFlashdata([
                "error"=>$this->validator->listErrors()]); //establece una variable de sesion con los errores correspondientes para pasarlos a una vista
                return redirect()->back()->withInput(); //regresa a la pagina anterior con los valores del input
            }
    }
    public function delete($id){
        $peliculas=new PeliculaModel();
        $peliculas->delete($id);
        return redirect()->route("dashboard/pelicula");
    }
}
?>