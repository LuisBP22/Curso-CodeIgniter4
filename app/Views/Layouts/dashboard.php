<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>bootstrap/dist/css/bootstrap.min.css">
    <title>dashboard</title>
</head>
<body>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand">Code Igniter 4</a>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            <li class="navbar-item  m-3">
                                <a href="<?=base_url()?>/dashboard/categoria" class="nav-link">Categoria</a>
                            </li>
                            <li class="navbar-item m-3">
                                <a href="<?=base_url()?>/dashboard/pelicula" class="nav-link">Peliculas</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        <div class="container">
            <div class="card">
            <h1 class="card-header"><?=$this->renderSection('header')?></h1>
                <div class="card-body">
        <?=view("mensaje")?>
        <?=view("form_errors")?>
        <?= $this->renderSection("contenido");?>
        </div>
        </div>
        </div>

</body>
</html>