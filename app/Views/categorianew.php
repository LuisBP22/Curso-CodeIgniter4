
<?= $this->extend("Layouts\dashboard"); //llama al layout?> 
    <?= $this->section("contenido") //decide la seccion que va a utilizar del layout?>
    <!--Aqui va el contenido propio de este archivo -->
    <?= $this->section("header");?>
    Crear Categoria
    <?=$this->endSection()?>
    <form action="/dashboard/categoria/create" method="post">
        <label class="form-label" for="titulo">Titulo</label>
            <input type="text" name="titulo" id=titulo class="form-control">
        <button class="btn btn-primary mt-3" type="submit">Crear</button>
    </form>
    <?=$this->endSection();?>
