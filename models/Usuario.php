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
        try {
            $sql = "INSERT INTO usuario (usuario_nombre, usuario_telefono, usuario_correo) VALUES ('$this->usuario_nombre', '$this->usuario_telefono', '$this->usuario_correo')";
            $resultado = self::ejecutar($sql);
    
            if (!$resultado) {
                throw new Exception('Error al ejecutar la consulta.');
            }
    
            return $resultado;
        } catch (Exception $e) {
            error_log('Error al guardar usuario: ' . $e->getMessage());
            return false;
        }
    }
    

    public function buscar() {
        $sql = "SELECT * FROM usuario";

        if ($this->usuario_nombre != '') {
            $sql .= " AND usuario_nombre LIKE '%$this->usuario_nombre%'";
        }

        if ($this->usuario_id != null) {
            $sql .= " AND usuario_id = $this->usuario_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

}
?>


