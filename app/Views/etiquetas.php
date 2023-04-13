<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pelicula</title>
</head>
<body>
    <form action="" method="post">
            <label for="categoria_id ">Categorias</label>
            <select name="categoria_id" id="categoria_id">
                <option value=""></option>
            <?php 
            foreach ($categoria as $key): //recorre todas las categorias que pasamos desde el controlador y las mete en options?> 
            <option <?= $key->id !=$categoria ?: "selected" ?>value="<?=$key->id?>"><?=$key->titulo?></option>
            <?php endforeach?>
            </select>
            <label for="etiqueta_id ">Etiquetas</label>
            <select name="etiqueta_id" id="etiqueta_id">
                <option value=""></option>
            <?php 
            foreach ($etiquetas as $key): //recorre todas las categorias que pasamos desde el controlador y las mete en options?> 
            <option value="<?=$key->id?>"><?=$key->titulo?></option>
            <?php endforeach?>

            </select>    
        <button type="submit" id="boton">Enviar</button>
    </form>
    <script>
        function disableButton(){
            if (document.querySelector("#etiqueta_id").value=="") {
                document.querySelector("#boton").disabled=true;
            }else{
                document.querySelector("#boton").removeAttribute("disabled");
            }
        }
     document.querySelector("#categoria_id").onchange=function(event){
        window.location.href="<?="/dashboard/pelicula/etiquetas/$pelicula->id";?>"+"?categoria_id="+this.value;
    }
    disableButton();
    </script>
</body>
</html>