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
        <div class="container">
            <div class="card">
                <div class="card-body d-flex align-items-center">
        <?=view("mensaje")?>
        <?=view("form_errors")?>
        <?= $this->renderSection("contenido"); //esto quiere decir que toda esta estructura se puede importar a otro archivo por lo que no hace falta hacer el html head, body etc. Solo el contenido de dentro del body?>
        </div>
        </div>
        </div>
</body>
</html>