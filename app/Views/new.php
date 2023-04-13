<?= $this->extend("Layouts\dashboard"); //llama al layout?> 
    <?= $this->section("contenido") //decide la seccion que va a utilizar del layout?>
    <!--Aqui va el contenido propio de este archivo -->
    <?= $this->section("header");?>
    Nueva Pelicula
    <?=$this->endSection()?>
    <div class="mb-3">
    <form action="/dashboard/pelicula/create" method="post">
        <label class="form-label" for="titulo">Titulo</label>
            <input type="text" name="titulo" id=titulo class="form-control" placeholder="Introduce aquí el título de la película">
        <label class="form-label">Descripcion</label>
            <textarea name="descripcion" id="descripcion" cols="50" rows="5" class="form-control" placeholder="Introduce una descripción para tu película"></textarea>
            <label class="form-label" for="categoria_id ">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control">
                <option value="">Selecciona la categoría correspondiente</option>
            <?php 
            foreach ($categoria as $key): //recorre todas las categorias que pasamos desde el controlador y las mete en options?> 
            <option value="<?=$key->id?>"><?=$key->titulo?></option>
            <?php endforeach?>

            </select>
        <button type="submit" class="btn btn-primary mt-3">Crear</button>
    </form>
    </div>
<?=$this->endSection()?>;