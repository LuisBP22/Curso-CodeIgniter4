<?= $this->extend("Layouts\web"); //llama al layout?> 
    <?= $this->section("contenido") //pone todo el contenido establecido en el layout con ese nombre?>
    <div class="">
    <form action="/login_usuario" method="post">
    <h1 class="text-center">Inicia Sesión</h1>
    <form action="/register_usuario" method="post">
    <label class="form-label" for="email" >Email</label>
    <input placeholder="Introduce tu correo" class="form-control" type="text" name="email" id="email">
    <label for="pass" class="form-label">Contraseña</label>
    <input type="password" name="pass" id="pass" class="form-control" placeholder="Introduce tu contraseña">
    <button type="submit" class="btn btn-primary mt-5">Iniciar Sesión</button>
    </form>
    </div>
    <?=$this->endSection()?>