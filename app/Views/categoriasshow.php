<?= $this->extend("Layouts\dashboard"); //llama al layout?> 
    <?= $this->section("contenido") //decide la seccion que va a utilizar del layout?>
    <!--Aqui va el contenido propio de este archivo -->
    <?= $this->section("header");?>
    Lista de Categorias
    <?=$this->endSection()?>
    <h1><?php echo $datos->titulo;?></h1>