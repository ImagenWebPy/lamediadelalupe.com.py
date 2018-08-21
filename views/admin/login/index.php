<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <img src="<?= URL; ?>public/images/logo.png" alt="Logo">
        </div>
        <p>Ingrese su usuario y contraseña para poder acceder al administrador</p>
        <form class="m-t" id="frmLoginAdmin">
            <div class="form-group">
                <span class="label label-danger" id="lblUsuario" style="display: none;"></span>
                <input type="email" class="form-control" name="login[email]" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <span class="label label-danger" id="lblContrasena" style="display: none;"></span>
                <input type="password" class="form-control" name="login[contrasena]" placeholder="Contraseña" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Iniciar</button>

            <!--<a href="#"><small>Olvidaste tu contraseña?</small></a>-->
        </form>
    </div>
</div>