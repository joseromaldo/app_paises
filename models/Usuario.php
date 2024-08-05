<?php
require_once 'Conexion.php';

class Usuario extends Conexion {
    public $usuario_id;
    public $usuario_nombre;
    public $usuario_telefono;
    public $usuario_correo;

    public function __construct($args = []) {
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->usuario_nombre = $args['usuario_nombre'] ?? '';
        $this->usuario_telefono = $args['usuario_telefono'] ?? '';
        $this->usuario_correo = $args['usuario_correo'] ?? '';
    }

    public function guardar() {
        $sql = "INSERT INTO usuarios (usuario_nombre, usuario_telefono, usuario_correo) VALUES ('$this->usuario_nombre', '$this->usuario_telefono', '$this->usuario_correo')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "SELECT * FROM usuarios WHERE 1=1";

        if ($this->usuario_nombre != '') {
            $sql .= " AND usuario_nombre LIKE '%$this->usuario_nombre%'";
        }

        if ($this->usuario_id != null) {
            $sql .= " AND usuario_id = $this->usuario_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar() {
        $sql = "UPDATE usuarios SET usuario_nombre = '$this->usuario_nombre', usuario_telefono = '$this->usuario_telefono', usuario_correo = '$this->usuario_correo' WHERE usuario_id = $this->usuario_id";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE usuario_id = $this->usuario_id";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
?>
