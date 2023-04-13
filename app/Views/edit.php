<?= $this->extend("Layouts\dashboard"); //llama al layout?> 
    <?= $this->section("contenido") //decide la seccion que va a utilizar del layout?>
    <!--Aqui va el contenido propio de este archivo -->
    <?= $this->section("header");?>
        Editar Pelicula
    <?=$this->endSection()?>
    
    <div>
    <form action="/dashboard/pelicula/update/<?php echo $peliculas->id;?> " method="post" enctype="multipart/form-data">
   
        <label class="form-label" for="titulo">Titulo</label>
        <input class="form-control" type="text" name="titulo" id="titulo" value=<?=old('titulo',urlencode($peliculas->titulo)) //la funcion old guarda el valor anterior)?>>
        <label class="form-label">Descripcion</label>
        <textarea name="descripcion" id="descripcion" cols="50" rows="5" class="form-control" ><?php echo $peliculas->descripcion;?></textarea>
        <label class="form-label" for="categoria_id"></label>
        <select name="categoria_id" id="categoria_id" class="form-control">
        <?php 
            foreach ($categoria_id as $key): //recorre todas las categorias que pasamos desde el controlador y las mete en options?>
            <option <?php if($key->id==old("categoria_id",$peliculas->categoria_id)) echo "selected" //selecciona el valor de la peticion anterior como el de defecto?> value="<?=$key->id?>"><?=$key->titulo?></option>
            <?php endforeach?>
        </select>
        <?php if ($peliculas->id):?>
      <label class="form-label" for="imagen">Imagen</label>
     <input class="form-control" type="file" name="imagen" id="imagen">
        <?php endif;?>
        <button type="submit" class="btn btn-primary mt-4">Enviar</button>
    </form>
    </div>
   
<?=$this->endSection()?>;