<?php

class productosModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    public function getProductoss()
    {
        $productos = $this->_db->query("select * from productos");
        return $productos->fetchall();
    }
    public function insertarProductos($codigo, $nombre, $precio, $marca, $descuento, $descripcion , $tamanio)
    {
        //guarda los productos en una bd
        $this->_db->prepare("INSERT INTO productos VALUES (:codigo, :nombre, :precio, :marca, :descuento, :descripcion, :tamanio )")
                ->execute(
                        array(
                            'codigo' => $codigo,
                            'nombre' => $nombre,
                            'precio' => $precio,
                            'marca' => $marca,
                            'descuento' => $descuento,
                            'descripcion' => $descripcion,
                            'tamanio' => $tamanio
                        )
                        );
    }
    public function insertarLista($usuario, $producto, $cantidad)
    {
        //guarda los productos en una bd
        $this->_db->prepare("INSERT INTO listcompras VALUES (null, :usuario, :producto, now() , 1 , :cantidad)")
                ->execute(
                        array(
                            'usuario' => $usuario,
                            'producto' => $producto,
                            'cantidad' => $cantidad
                        )
                        );
    }
    public function getProductos($codigo){
        $codigo = (int) $codigo;
         $productos = $this->_db->query("select * from productos where codigo = $codigo");
        return $productos->fetch();
    }
    public function editarProductos($codigo, $nombre, $precio, $marca, $descuento, $descripcion , $tamanio)
    {
        $codigo = (int) $codigo;
         $this->_db->prepare("UPDATE productos SET nombre = :nombre, precio = :precio, marca = :marca, descuento = :descuento, descripcion = :descripcion, tamanio = :tamanio WHERE codigo = :codigo")
                ->execute(
                        array(
                            'codigo' => $codigo,
                            'nombre' => $nombre,
                            'precio' => $precio,
                            'marca' => $marca,
                            'descuento' => $descuento,
                            'descripcion' => $descripcion,
                            'tamanio' => $tamanio
                        )
                        );
    }
    public function bajaProd($codigo)
    {
        
         $this->_db->prepare("UPDATE productos SET estado = 2 WHERE codigo = :codigo")
                ->execute(
                        array(
                            'codigo' => $codigo
                        )
                        );
    }
    public function altaProd($codigo)
    {
        
         $this->_db->prepare("UPDATE productos SET estado = 1 WHERE codigo = :codigo")
                ->execute(
                        array(
                            'codigo' => $codigo
                        )
                        );
    }
}
?>

