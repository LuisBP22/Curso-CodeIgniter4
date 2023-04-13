<?= $this->extend("Layouts\dashboard"); //llama al layout?> 
    <?= $this->section("contenido") //decide la seccion que va a utilizar del layout?>
    <!--Aqui va el contenido propio de este archivo -->
    <h1 class="text-center"><?php echo $data->titulo //data es la variable definida en el controlador y titulo es su propiedad;?></h1>
    <p class="text-center"><?php echo $data->descripcion;?></p>
    <?php foreach ($imagenes as $i):?> 
        <li class="text-center"><img  class="img-fluid"src="/uploads/peliculas/<?=$i->imagen?>" alt="" width="500" height="300">
        <div class="d-flex justify-content-around">
        <form action="/dashboard/pelicula/borrarimagen/<?=$i->id?>" method="post">
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
            <form action="/dashboard/pelicula/descargarimagen/<?=$i->id?>" method="post">
                <button type="submit" class="btn btn-primary">Descargar</button>
            </form>
        </div>
           
    </li>    
<?php endforeach;?>
<?=$this->endSection();?>