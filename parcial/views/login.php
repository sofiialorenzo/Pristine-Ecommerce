<div class="row my-5 justify-content-center">
    <div class="col col-md-5">
        <h1 class="text-center mb-5">Inciar Sessión</h1>

        <form class="row g-3 m-2" action="admin/actions/auth_login.php" method="post">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input class="form-control" type="text" name="email">
            <label for="pass" class="form-label">Contraseña</label>

            <input class="form-control" type="text" name="pass">
            <button class="btn" type="submit">Login</button>
            <a class="btn" href="index.php?sec=registro">Registrar</a>
        </form>
    </div>
</div>
