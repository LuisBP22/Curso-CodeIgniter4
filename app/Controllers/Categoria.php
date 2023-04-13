<?php 
namespace App\Controllers;  
use App\Models\CategoriasModel;
class Categoria extends BaseController {
public function index(){
    $categoria=new CategoriasModel();
    return view("categoria.php",
            ["categorias"=>$categoria->paginate(10), //antes era findAll() no paginate
             "pager"=>$categoria->pager
            ]
        );
}
public function show($id){
    $categoria=new CategoriasModel();
    return view("categoriasshow.php",[
        "datos"=>$categoria->find($id)
    ]);
}
public function new(){
    return view("categorianew");
}
public function create(){
    $categoria=new CategoriasModel();
    if ($this->validate("categorias")) {
        $categoria->insert([
            "titulo"=>$this->request->getPost("titulo")
       ]);
    }else{
        session()->setFlashdata([
            "error"=>$this->validator->listErrors()
        ]);
        return redirect()->back()->withInput();
    }
   
}
public function edit($id){
    $categoria=new CategoriasModel();
    return view("categoriaedit", [
        "titulo"=>$categoria->find($id)
    ]);
}
public function update($id){
    $categoria=new CategoriasModel();
    if ($this->validate("categorias")) {
    $categoria->update($id, [
        "titulo"=>$this->request->getPost("titulo")
    ]);
    }else{
        session()->setFlashdata([
            "error"=>$this->validator->listErrors()
        ]);
        return redirect()->back()->withInput();
    }
    return redirect()->back()->with("mensaje", "Operacion Actualizada Correctamente");
}
public function delete($id){
    $categoria=new CategoriasModel();
    $categoria->delete($id);
    return redirect()->back();
}
}
?>