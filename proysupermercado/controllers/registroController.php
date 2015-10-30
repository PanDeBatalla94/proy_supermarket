<?php
class registroController extends Controller
{
    private $_registro;
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
    }
    public function index() {
        //si esta autenticado no puedo registrarse
        if(Session::get('autenticado'))
        {
            $this->redireccionar();
        }
        $this->_view->titulo = 'Registro';
        if($this->getInt('enviar')==1)
        {
            $this->_view->datos = $_POST;
            if(!$this->getSql('ci'))
            {
                $this->_view->_error = 'Debe introducir el ci';
                $this->_view->renderizar('index' , 'registro');
                exit;
                
            }
            if(!$this->getSql('nombre'))
            {
                $this->_view->_error = 'Debe introducir el nombre';
                $this->_view->renderizar('index' , 'registro');
                exit;
                
            }
            if(!$this->getSql('usuario'))
            {
                $this->_view->_error = 'Debe introducir el usuario';
                $this->_view->renderizar('index' , 'registro');
                exit;
                
            }
            
            if($this->_registro->verificarUsuario($this->getAlphaNum('usuario')))
            {
                $this->_view->_error = 'El usuario' . $this->getAlphaNum('usuario'). 'ya esta registrado';
                $this->_view->renderizar('index' , 'registro');
                exit;
            }
             if(!$this->getSql('telefono'))
            {
                $this->_view->_error = 'Debe introducir el telefono';
                $this->_view->renderizar('index' , 'registro');
                exit;
                
            }
            
             if(!$this->validarEmail($this->getPostParam('email')))
            {
                $this->_view->_error = 'La direccion de email es invalida';
                $this->_view->renderizar('index' , 'registro');
                exit;
                
            }
            if($this->_registro->verificarEmail($this->getPostParam('email')))
            {
                $this->_view->_error = 'Esta direccion ya esta registrada';
                $this->_view->renderizar('index' , 'registro');
                exit;
            }
            
        if(!$this->getSql('password'))
            {
                $this->_view->_error = 'Debe introducir el password';
                $this->_view->renderizar('index' , 'registro');
                exit;
                
            }
                    if($this->getPostParam('password') != $this->getPostParam('confirmar'))
            {
                $this->_view->_error = 'Los passwords no coinciden';
                $this->_view->renderizar('index' , 'registro');
                exit;
                
            }

         $this->_registro->registrarUsuario( 
                
                 $this->getSql('ci'),
                 $this->getSql('nombre'),
                 $this->getSql('usuario'),
                 $this->getSql('telefono'),
                 $this->getSql('password'),
                 $this->getPostParam('email')
                 );
         if(!$this->_registro->verificarUsuario($this->getAlphaNum('usuario')))
         {
             $this->_view->_error = 'error al registrar el usuario';
             $this->_view->renderizar('index', 'registro');
             exit;
         }
         $this->_view->datos = false;
          $this->_view->_mensaje = 'registro completado';
        }
            $this->_view->renderizar('index' , 'registro');
        
    
    }

}
?>

