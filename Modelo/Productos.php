<?php
require_once "conexion.php";

class Producto {
    public $id, $codigo, $producto, $precio, $cantidad;
    public $errors = [];

    public function __construct($datos = []) {
        $this->id       = $datos['id'] ?? null;
        $this->codigo   = trim($datos['Codigo'] ?? '');
        $this->producto = trim($datos['Producto'] ?? '');
        $this->precio   = $datos['Precio'] ?? '';
        $this->cantidad = $datos['Cantidad'] ?? '';
    }

    // $minCantidad: 1 al guardar, 0 al modificar (regla de negocio de la guía)
    public function validar($minCantidad = 1) {
        if ($this->codigo === '')   $this->errors['Codigo']   = "El código es obligatorio";
        if ($this->producto === '') $this->errors['Producto'] = "El producto es obligatorio";
        if (!is_numeric($this->precio) || $this->precio <= 0)
            $this->errors['Precio'] = "Precio inválido";
        if (!is_numeric($this->cantidad) || $this->cantidad < $minCantidad)
            $this->errors['Cantidad'] = "La cantidad debe ser al menos $minCantidad";
        return empty($this->errors);
    }

    public function guardar() {
        $sql = "INSERT INTO producto (codigo, producto, precio, cantidad) VALUES (?,?,?,?)";
        return DB::getInstancia()->insertSeguro($sql,
            [$this->codigo, $this->producto, $this->precio, $this->cantidad]);
    }

    public function editar() {
        $sql = "UPDATE producto SET codigo=?, producto=?, precio=?, cantidad=? WHERE id=?";
        return DB::getInstancia()->updateSeguro($sql,
            [$this->codigo, $this->producto, $this->precio, $this->cantidad, $this->id]);
    }

    public static function buscar($texto) {
        $sql = "SELECT * FROM producto WHERE codigo LIKE ? OR producto LIKE ? ORDER BY id DESC";
        return DB::getInstancia()->query($sql, ["%$texto%", "%$texto%"]);
    }
}