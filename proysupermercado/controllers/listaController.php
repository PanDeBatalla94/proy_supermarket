<?php

class listaController extends Controller
{
    private $_lista;
    public function __construct() {
        parent::__construct();
        $this->_lista = $this->loadModel('lista');
    }
     public function index()
    {
        
        $this->_view->listas = $this->_lista->getListas();
        $this->_view->titulo = 'Lista';
        $this->_view->renderizar('index', 'lista');
    }
    
    public function aumentar($id){
        $this->_view->titulo = 'Agregar a la lista';
        $this->_view->setJs(array('nuevo'));
        
        if(!$this->filtrarInt($id))
        {
            $this->redireccionar('lista');//si no es entero redirige a productos
        }
        if(!$this->_lista->getLista($this->filtrarInt($id))){
             $this->redireccionar('lista');     
        }
        $this->_lista->aumentar($this->filtrarInt($id));
        $this->_view->_mensaje = 'registro completado';   
        $this->redireccionar('lista'); 
    }
     
    
     
    }


?>