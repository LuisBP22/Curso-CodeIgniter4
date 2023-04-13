<?= $this->extend("Layouts\web"); //llama al layout?> 
    <?= $this->section("contenido")?>
    <div>
    <h1 class="text-center">Registrarse</h1>
    <form action="/register_usuario" method="post">
    <label class="form-label" for="email" >Email</label>
    <input placeholder="Introduce tu correo" class="form-control" type="text" name="email" id="email">
    <label class="form-label" for="usuario">Usuario</label>
    <input placeholder="Introduce un nombre usuario" class="form-control" type="text" name="usuario" id="usuario">
    <label for="pass" class="form-label">Contraseña</label>
    <input type="password" name="pass" id="pass" class="form-control" placeholder="Introduce una contraseña">
    <button type="submit" class="btn btn-primary mt-5">Registrarse</button>
    </form>
    </div>
    <?=$this->endSection()?>