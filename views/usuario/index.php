
    <?php include_once '../../includes/header.php'; ?>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>Formulario</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="formulario" class="card p-4 shadow-sm mb-4">
                    <div class="form-group mb-3">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" id="username" class="form-control mt-2" placeholder="Ingrese el nombre de usuario">
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" class="form-control mt-2" placeholder="Ingrese el nombre completo">
                    </div>
                    <div class="form-group mb-3">
                        <label for="country">País de origen</label>
                        <select class="form-select mt-2" id="country">
                            <option selected>Seleccionar País</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="area-code">Código de área</label>
                        <input type="text" id="area-code" class="form-control mt-2" placeholder="Código de área" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone">Teléfono</label>
                        <input type="tel" id="phone" class="form-control mt-2" placeholder="Ingrese el número de teléfono">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Correo</label>
                        <input type="email" id="email" class="form-control mt-2" placeholder="Ingrese el correo electrónico">
                    </div>
                    <div class="text-center">
                        <button type="submit" id="btn" class="btn btn-primary mt-3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-12 table-responsive">
                <h2 class="text-center mt-3">Listado de programadores</h2>
                <table class="table table-bordered table-hover mt-3" id="tabla">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9" class="text-center">No hay registros disponibles</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script defer src="/app_paises/src/funciones.js"></script>
    <script defer src="/app_paises/src/js/usuario/index.js"></script>

    <?php include_once '../../includes/footer.php'; ?>

