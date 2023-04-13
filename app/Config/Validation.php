<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $categorias=[
        "titulo"=>"required|min_length[3]|max_length[200]" //$categorias es la vaeriable que se va a validar despues en el controlador usando el metodo validate y titulo es solo el campo
    ];
    public $peliculas=[
        "titulo"=>"required|min_length[3]|max_length[200]",
        "descripcion"=>"required|min_length[3]|max_length[2000]",
        "categoria_id"=>"required|is_natural"
    ];
    public $usuarios=[
        "usuario"=>"required|min_length[3]|max_length[50]|is_unique[usuarios.usuario]", //el partametro usuarios.usuario es la tabla y el campo por el que queremos que sean unicos
        "email"=>"required|min_length[3]|max_length[90]|is_unique[usuarios.email]", //el partametro usuarios.usuario es la tabla y el campo por el que queremos que sean unicos
        "pass"=>"required|min_length[3]|max_length[50]", //el partametro usuarios.usuario es la tabla y el campo por el que queremos que sean unicos
    ];
}
