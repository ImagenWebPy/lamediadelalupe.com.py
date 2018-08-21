
<!-- Mainly scripts -->
<script src="<?= URL; ?>public/admin/js/jquery-3.1.1.min.js"></script>
<script src="<?= URL; ?>public/admin/js/custom.js"></script>
<script src="<?= URL; ?>public/admin/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#frmLoginAdmin").submit(function (e) {
            //deshabilitamos la funcion por defecto del formulario
            e.preventDefault();
            //capturamos los datos enviados
            var usuario = $("input[name='login[email]']").val();
            var contrasena = $("input[name='login[contrasena]']").val();
            //guardamos los label en variables
            var labelUsuario = $("#labelUsuario");
            var labelContrasena = $("#labelContrasena");
            if (usuario.length > 0 && contrasena.length > 0) {
                //reseteamos los labels
                var labels = ['#lblUsuario', '#lblContrasena'];
                resetLabels(labels)
                //enviamos el formulario por ajax
                var url = "<?= URL ?>login/iniciar"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: 'json',
                    data: $("#frmLoginAdmin").serialize(), //serializamos los elementos del formulario.
                    success: function (data)
                    {
                        if (data.type == 'success') {
                            $(location).attr('href', data.content);
                        } else {
                            $('#' + data.label).css('display', 'inline-block');
                            $('#' + data.label).html(data.content);
                        }
                    }
                });
            } else {
                //mostramos el error de campos vacios
                if (usuario.length == 0) {
                    labelUsuario.css('display', 'inline-block');
                    labelUsuario.html('Por favor ingrese su usuario');
                }
                if (contrasena.length == 0) {
                    labelContrasena.css('display', 'inline-block');
                    labelContrasena.html('Por favor ingrese su contraseña');
                }
            }
            
        });
    });
</script>

</body>

</html>