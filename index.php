<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CRUD Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="container py-4">
  <h2>Registro de Productos</h2>

  <form id="formProducto" class="row g-3">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="Accion" id="Accion" value="Guardar">

    <div class="col-md-3"><label>Código</label>
      <input class="form-control" type="text" name="Codigo" id="Codigo"></div>
    <div class="col-md-3"><label>Producto</label>
      <input class="form-control" type="text" name="Producto" id="Producto"></div>
    <div class="col-md-3"><label>Precio</label>
      <input class="form-control" type="number" step="0.01" min="0.01" name="Precio" id="Precio"></div>
    <div class="col-md-3"><label>Cantidad</label>
      <input class="form-control" type="number" step="1" min="1" name="Cantidad" id="Cantidad"></div>

    <div class="col-12">
      <button type="button" id="btnGuardar" class="btn btn-primary">Registrar</button>
      <button type="button" id="btnCancelar" class="btn btn-secondary">Cancelar</button>
    </div>
  </form>

  <hr>
  <input class="form-control mb-3" id="buscador" placeholder="Buscar por código o producto...">

  <table class="table table-striped">
    <thead><tr><th>ID</th><th>Código</th><th>Producto</th><th>Precio</th><th>Cantidad</th><th></th></tr></thead>    <tbody id="tablaProductos"></tbody>
  </table>

  <script src="script.js"></script>
</body>
</html>