<?php


require_once '../../models/Conexion.php';

class Alquileres extends Conexion {

    public $id_alquiler, $fecha_alquiler, $id_inventario, $id_cliente, $fecha_devolucion, $id_empleado;

    public static function all()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $pre = mysqli_prepare($conexion->con, "SELECT * FROM alquiler LIMIT 50");
        $pre->execute();
        $res = $pre->get_result();

        $alquileres = array();
        while ($alquiler = $res->fetch_object(Alquiler::class)) {
            array_push($alquileres, $alquiler);
        }

        return $alquileres;
    }

    public function create()
    {
        
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO alquiler (fecha_alquiler, id_inventario, id_cliente, fecha_devolucion, id_empleado) VALUES (?, ?, ?, ?, ?)");
        $pre->bind_param("siisi", $this->fecha_alquiler, $this->id_inventario, $this->id_cliente, $this->fecha_devolucion, $this->id_empleado);
        $pre->execute();
    }
}