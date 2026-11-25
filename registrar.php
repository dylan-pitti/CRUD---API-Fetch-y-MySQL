<?php
header("Content-Type: application/json"); // al inicio, antes de cualquier salida
require_once "Modelo/Productos.php";

$accion = $_POST['Accion'] ?? '';

try {
    switch ($accion) {
        case 'Guardar':
            $p = new Producto($_POST);
            if (!$p->validar(1)) {
                $response = ["success"=>false, "message"=>"Revise los campos",
                             "accion"=>"Guardar", "errors"=>$p->errors];
                break;
            }
            $p->guardar();
            $response = ["success"=>true, "message"=>"Producto creado",
                         "accion"=>"Guardar", "errors"=>[]];
            break;

        case 'Modificar':
            $p = new Producto($_POST);
            if (!$p->validar(0)) {
                $response = ["success"=>false, "message"=>"Revise los campos",
                             "accion"=>"Modificar", "errors"=>$p->errors];
                break;
            }
            $p->editar();
            $response = ["success"=>true, "message"=>"Producto actualizado",
                         "accion"=>"Modificar", "errors"=>[]];
            break;

        case 'Buscar':
            $datos = Producto::buscar($_POST['Texto'] ?? '');
            $response = ["success"=>true, "message"=>"OK",
                         "accion"=>"Buscar", "data"=>$datos, "errors"=>[]];
            break;

        default:
            $response = ["success"=>false, "message"=>"Acción no válida",
                         "accion"=>$accion, "errors"=>[]];
    }
} catch (Exception $e) {
    $response = ["success"=>false, "message"=>"Error en el servidor",
                 "accion"=>$accion, "errors"=>[]];
}

echo json_encode($response);
exit;