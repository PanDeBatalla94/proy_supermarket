<?php

class listaModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    public function getListas()
    {
        $user = Session::get('id');
        $productos = $this->_db->query("select listcompras.id as idl, productos.codigo AS prodcod, productos.nombre AS prodnom, listcompras.cantidad AS listcant from productos INNER JOIN listcompras ON listcompras.idusuario = $user WHERE  productos.codigo = listcompras.codprod");
        return $productos->fetchall();
    }
    
    public function getLista($id){
        $id = (int) $id;
         $productos = $this->_db->query("select * from listcompras where id = $id");
        return $productos->fetch();
    }

    public function aumentar($id)
    {
        
         $this->_db->prepare("UPDATE listcompras SET cantidad = cantidad + 1 WHERE id = :id")
                ->execute(
                        array(
                            'id' => $id
                        )
                        );
    }
    public function reducir($id)
    {
        
         $this->_db->prepare("UPDATE listcompras SET cantidad = cantidad-1 WHERE id = :id")
                ->execute(
                        array(
                            'id' => $id
                        )
                        );
    }
   
}
?>

