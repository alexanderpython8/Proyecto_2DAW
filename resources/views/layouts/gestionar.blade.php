<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Gestion')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/estilo_gestion.css') }}">
    @yield('fondo')
</head>
<body class="bg-light">
    <aside class="bg-primary text-white d-flex flex-column p-3"
            style="width: 260px; min-height: 100vh; position: fixed; left:0; top:0;">

        <div class="text-center mb-4">
            <img src="{{ asset('assets/img/Comprar.jpg') }}"
                    class="rounded-circle mb-2" width="80" height="80" alt="avatar">

            <h5>Usuario</h5>
            <small>Administrador</small>

            <!-- Botón para cerrar sesión y volver al index -->
            <div class="mt-2">
                <a href="{{ route('welcome') }}" class="btn btn-danger">Cerrar sesión</a>
            </div>
        </div>

        <hr>

        <div class="list-group">

            <a href="{{ route('gestion_ast') }}"
                class="list-group-item list-group-item-action">
                👥 Astros
            </a>

            <a href="{{ route('gestion_com') }}"
                class="list-group-item list-group-item-action">
                🌍 Comprar
            </a>

            <a href="{{ route('gestion_alq') }}"
                class="list-group-item list-group-item-action">
                🧾 Alquiler
            </a>

            <a href="{{ route('gestion_pag') }}"
                class="list-group-item list-group-item-action">
                🔒 Pagos
            </a>

            <a href="{{ route('gestion_usr') }}"
                class="list-group-item list-group-item-action">
                💻 Usuario
            </a>

            <a href="{{ route('panel_control') }}"
                class="list-group-item list-group-item-action">
                💻 Panel de control
            </a>

        </div>

    </aside>

    <div class="container-fluid mt-4" style="padding-left: 300px;">
        @yield('principal')
    </div>

    <!-- Confirmación de eliminacion de usuario -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @yield('MEliminacion', '¿Seguro que deseas eliminar este dato?')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pequeño script para el uso de una funcion que elimina de la tabla Usuario el dato elegido -->
    <!-- <script>
        function eliminarUsuario(numusuario)
        {
            const modal = new bootstrap.Modal(document.getElementById('confirmModal'));
            modal.show();
            document.getElementById('confirmDeleteBtn').onclick = () =>
            {
                window.location.href = 'gestion_usuarios.php?eliminar=' + numusuario;
                modal.hide();
            };
        }
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
