const form = document.getElementById('formProducto');

// Lista (y busca) productos y llena la tabla
async function ListarProductos(texto = '') {
  const fd = new FormData();
  fd.append('Accion', 'Buscar');
  fd.append('Texto', texto);
  try {
    const res = await fetch('registrar.php', { method: 'POST', body: fd });
    if (!res.ok) throw new Error('Respuesta de red no válida');
    const r = await res.json();
    const tbody = document.getElementById('tablaProductos');
    tbody.innerHTML = '';
    r.data.forEach(p => {
        tbody.innerHTML += `
        <tr>
            <td>${p.id}</td>
            <td>${p.codigo}</td><td>${p.producto}</td>
            <td>${p.precio}</td><td>${p.cantidad}</td>
            <td><button class="btn btn-sm btn-warning"
                onclick='cargarParaEditar(${JSON.stringify(p)})'>Editar</button></td>
        </tr>`;
    });
  } catch (e) {
    Swal.fire('Error', 'No se pudo cargar la lista', 'error');
  }
}

// Pone el formulario en modo edición
function cargarParaEditar(p) {
  id.value = p.id; Codigo.value = p.codigo; Producto.value = p.producto;
  Precio.value = p.precio; Cantidad.value = p.cantidad;
  Accion.value = 'Modificar';
  Cantidad.min = 0;                       // al editar se permite 0
  btnGuardar.textContent = 'Actualizar';
}

function resetFormulario() {
  form.reset();
  id.value = '';
  Accion.value = 'Guardar';
  Cantidad.min = 1;                       // al crear mínimo 1
  btnGuardar.textContent = 'Registrar';
}

// Validación del lado del cliente
function validarCliente() {
  if (!Codigo.value.trim() || !Producto.value.trim() || !Precio.value || Cantidad.value === '') {
    Swal.fire('Atención', 'Complete todos los campos', 'warning');
    return false;
  }
  return true;
}

btnGuardar.addEventListener('click', async () => {
  if (!validarCliente()) return;
  try {
    const res = await fetch('registrar.php', { method: 'POST', body: new FormData(form) });
    if (!res.ok) throw new Error('Respuesta de red no válida');
    const r = await res.json();

    // switch en JS según la acción que devolvió el servidor
    switch (r.accion) {
      case 'Guardar':
      case 'Modificar':
        if (r.success) {
          Swal.fire('Éxito', r.message, 'success');
          resetFormulario();
          ListarProductos();
        } else {
          const detalle = Object.values(r.errors).join('<br>');
          Swal.fire({ icon: 'error', title: r.message, html: detalle });
        }
        break;
      default:
        Swal.fire('Error', r.message, 'error');
    }
  } catch (e) {
    Swal.fire('Error', 'Falla de comunicación con el servidor', 'error');
  }
});

btnCancelar.addEventListener('click', resetFormulario);
buscador.addEventListener('input', e => ListarProductos(e.target.value));

ListarProductos();