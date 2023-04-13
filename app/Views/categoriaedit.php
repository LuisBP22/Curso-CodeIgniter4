<?= $this->extend("Layouts\dashboard"); //llama al layout?> 
    <?= $this->section("contenido") //decide la seccion que va a utilizar del layout?>
    <!--Aqui va el contenido propio de este archivo -->
    <?= $this->section("header");?>
    Editar Categoria
    <?=$this->endSection()?>
    <form action="/dashboard/categoria/update/<?php echo $titulo->id?>" method="post">
        <label for="titulo" class="form-label">Titulo</label>
            <input class="form-control" type="text" name="titulo" id=titulo value=<?php echo $titulo->titulo;?>>
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
    </form>
<?= $this->endSection()?>