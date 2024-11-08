<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario con reCAPTCHA</title>
    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
</head>
<body>
    @session('errors')
    <p>Se ha producido un error</p>
    @endsession

    <h1>Formulario con reCAPTCHA</h1>
    <form method="POST" action="{{ url('verify-recaptcha') }}">
        @csrf
        <!-- Otros campos del formulario aquí -->

        <!-- Campo oculto para el token de reCAPTCHA -->
        <input type="hidden" name="g-recaptcha-response" id="recaptcha-token">

        <button type="submit">Enviar</button>
    </form>

    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {action: 'submit'}).then(function(token) {
                document.getElementById('recaptcha-token').value = token;
            });
        });
    </script>

</body>
</html>