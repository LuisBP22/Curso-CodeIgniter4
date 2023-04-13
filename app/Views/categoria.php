
<?= $this->extend("Layouts\dashboard"); //llama al layout?> 
    <?= $this->section("contenido") //decide la seccion que va a utilizar del layout?>
    <!--Aqui va el contenido propio de este archivo -->
    <?= $this->section("header");?>
    Lista de Categorias
    <?=$this->endSection()?>
    <a  class="btn btn-success" href="/dashboard/categoria/new">Crear</a>
    <table class="table">
        <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Opciones</th>
        </tr>

    <?php foreach ($categorias as $key => $value):?>
     <!--//los dos puntos indican que el foreach aun no se va a cerrar y estas variables salen de la funcion index del controlador de las peliculas ?>
        php foreach ($test as $key => $value) es lo que estaba antes. los dos puntos indican que el foreach aun no se va a cerrar y estas variables salen de la funcion index del controlador de las peliculas ?>-->
        <tr>
        <td><?php echo $value->id;?></td>
        <!--puede ser $value["id"] si el return type es array en el modelo -->
        <td><?php echo $value->titulo;?></td>
        <td>
            <a class="btn btn-success mb-2" href="/dashboard/categoria/edit/<?php echo $value->id?>">Edit</a>
            <a class="btn btn-primary mb-2"href="/dashboard/categoria/show/<?php echo $value->id?>">Show</a>
            <form action="/dashboard/categoria/delete/<?php echo $value->id;?>" method="post">
                <button type="submit" class="btn btn-danger mb-2">Delete</button>
            </form>
        </td>
        </tr>
    <?php endforeach; //cierra los foreach que empiezan dentro de un html?>
    </table>
    <?=$pager->links();?>   
    <?= $this->endSection(); //termina las secciones?>
  
