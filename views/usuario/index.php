<? include_once '../../includes/header.php'; ?>
    <div class="container mt-5 w-50 p-4 border rounded shadow bg-light">
    <div id="head">
    <h1 class="mb-4 text-center">Ingrese información personal:
    </h1>
    <form class="mb-4">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="search" id="name" class="form-control mt-2" placeholder="Ingrese el nombre completo">
            <label for="nameUsuario">Usuario de Github</label>
            <input type="search" id="nameUsuario" class="form-control mt-2" placeholder="Ingrese usuairio en github">
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
<script defer src="/app_paises/src/funciones.js"></script>
<script defer src="/app_paises/src/js/usuario/index.js"></script>
<?php include_once '../../includes/footer.php'; ?>
