<? include_once '../../includes/header.php'; ?>
    <div class="container mt-5 w-50 p-4 border rounded shadow bg-light">
    <div id="head">
    <h1 class="mb-4 text-center">Ingrese información personal:
    </h1>
    <form class="mb-4">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="search" id="name" class="form-control mt-2" placeholder="Ingrese el nombre completo">
            <select class="form-select" id="select">País de origen
                <option selected>Seleccionar País</option>
            </select>
            <!-- <select class="form-select" name="tar_app" id="tar_app" required>
          <option selected>Seleccionar aplicación</option>
        </select> -->
        </div>
        
        <button type="submit" id="btn" class="btn btn-primary mt-3">Enviar</button>
    </form>
<!-- </div>
    <div id="info" class="p-4 border rounded shadow-sm">
        <h2 id="nombrePais" class="mb-3"></h2>
        <h2 id="capitalPais" class="mb-3"></h2>
        <h2 id="continentePais" class="mb-0"></h2>
        <div class="d-flex justify-content-center align-items-center">
            <img src="#" alt="Foto" id="imgPais" class="w-50 h-50 mt-5">
        </div>
    </div> -->
</div>

<div class="row justify-content-center">
        <div class="col-lg-12 table-responsive">
            <h2 class="text-center mt-3">Listado de programadores</h2>
            <table class="table table-bordered table-hover" id="tablaTareas">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Pais</th>
                        <th>Código de Marcación</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                         <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="9" class="text-center">No hay registros disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
<script defer src="/app_paises/src/funciones.js"></script>
<script defer src="/app_paises/src/js/usuario/index.js"></script>
<?php include_once '../../includes/footer.php'; ?>
