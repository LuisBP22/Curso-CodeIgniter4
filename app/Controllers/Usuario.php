<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use PHPUnit\Util\Xml\Validator;

class Usuario extends BaseController
{
    public function crear_usuario()
    {
        $usuario=new UsuarioModel();
        $usuario->insert([
            "usuario"=>"admin",
            "email"=>"admin@gmail.com",
            "pass"=>$usuario->passHash("12345")
        ]);
    }
   public function login(){
        return view("/login");
   }
   public function login_post(){
    $usuarioModel=new UsuarioModel();
    $email=$this->request->getPost("email");
    $pass=$this->request->getPost("pass");
    $user=$usuarioModel->select("id,usuario,email,pass,tipo")->
    orWhere("email",$email)->
    orWhere("usuario",$email)
    ->first();
    if (!$user) {
        return redirect()->back()->with("mensaje","Usuario no valido");
    }
    if ($usuarioModel->verificarpass($pass, $user->pass)) {
        unset($user->pass);
        session()->set("usuario",$user);
        return redirect()->to("/dashboard/pelicula")->with("mensaje","Bienvenido usuario $user->usuario");
    }
    return redirect()->back()->with("mensaje","Usuario no valido");
   }

   public function crearUsuarios(){
    return view("/register");
   }
   public function crear_post(){
        $usuarioModel=new UsuarioModel();
        if ($this->validate("usuarios")) { //ese el campo para validar con las reglas establecidas en el archivo de validate
            $usuarioModel->insert([
                "usuario"=>$this->request->getPost("usuario"),
                "email"=>$this->request->getPost("email"),
                "pass"=>$usuarioModel->passHash($this->request->getPost("pass"))
                
            ]);
            return redirect()->to("/login")->with("mensaje","Bienvenido usuario");
        }
        session()->setFlashdata([
            "validation"=>$this->validator
        ]);
        return redirect()->back()->withInput();
   }
   public function logout(){ //falta asignarle una ruta
    session()->destroy();
    return redirect()->to("dashboard/pelicula");
   }
}
