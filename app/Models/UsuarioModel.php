<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    //ya que los modelos sirven como puente entre la bdat y los controladores, los metodos dpara usar en el controlador se definen aqui
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ["usuario","email","pass"];

    public function passHash ($passHash){
        return password_hash($passHash,PASSWORD_DEFAULT); //funcion que convierte la pass a pass hash
    }
    public function verificarpass($pass, $passHash){
        return password_verify($pass,$passHash); //funcion que verifica que sean iguales las contraseñas
    }

}
