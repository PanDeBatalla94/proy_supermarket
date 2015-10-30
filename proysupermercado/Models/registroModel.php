<?php
class registroModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
            "select id from usuarios where usuario = '$usuario'"
        );
        //comprobamos si el usuario esta registrado
        if($id->fetch()){
            return true;
        }
        return false;
    }
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
            "select id from usuarios where email = '$email'"
        );
        //comprobamos si el usuario esta registrado
        if($id->fetch()){
            return true;
        }
        return false;
    }
    public function registrarUsuario($ci, $nombre, $usuario, $telefono, $password, $email)
    {
        $this->_db->prepare(
                "insert into usuarios values" . 
                "(null, :ci, :nombre, :usuario, :telefono, :password, :email , 'usuario', 1)"
                )
                ->execute(array(
                              ':ci' => $ci,
                               ':nombre' => $nombre,
                            ':usuario' => $usuario,
                            ':telefono' => $telefono,
                            ':password' => Hash::getHash('sha1', $password, HASH_KEY),
                            ':email' => $email
                ));
    }
}
?>

