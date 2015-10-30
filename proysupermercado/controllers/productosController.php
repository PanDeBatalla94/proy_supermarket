<?php

class productosController extends Controller
{
    private $_productos;
    public function __construct() {
        parent::__construct();
        $this->_productos = $this->loadModel('productos');
    }
     public function index()
    {
        
        $this->_view->productoss = $this->_productos->getProductoss();
        $this->_view->titulo = 'Productos';
        $this->_view->renderizar('index', 'productos');
    }
    
    public function nuevo()
    {
        //restringir para usuarios
        Session::accesoEstricto(array('usuarios'));
        /////////////////////////////////////////
        $this->_view->titulo = 'Nuevo Productos';
        $this->_view->setJs(array('nuevo'));

        if($this->getInt('guardar') == 1){
            
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('codigo')){
                $this->_view->_error = 'debe introducir el codigo';
                $this->_view->renderizar('nuevo', 'productos');
                exit;
            }
            
            if(!$this->getTexto('nombre')){ //nombre del campo del view
                $this->_view->_error = 'debe introducir el nombre';
                $this->_view->renderizar('nuevo', 'productos');
                exit;
            }
            $this->_productos->insertarProductos(
            $this->getPostParam('codigo'),
            $this->getPostParam('nombre'),
            $this->getPostParam('precio'),
            $this->getPostParam('marca'),
            $this->getPostParam('descuento'),
            $this->getPostParam('descripcion'),
            $this->getPostParam('tamanio')
            );
            $this->redireccionar('productos');
        }
            
        $this->_view->renderizar('nuevo','productos');
    }
    public function editar($codigo){
        if(!$this->filtrarInt($codigo))
        {
            $this->redireccionar('productos');//si no es entero redirige a productos
        }
        if(!$this->_productos->getProductos($this->filtrarInt($codigo))){
             $this->redireccionar('productos');     
        }
        $this->_view->datos = $_POST;
        $this->_view->titulo = 'Editar post';
        $this->_view->setJs(array('nuevo'));
       
        //si se apreto guardar
         if($this->getInt('guardar') == 1){
            
            $this->_view->datos = $_POST;
            
         /*   if(!$this->getTexto('nombre')){
                $this->_view->_error = 'debe introducir el nombre';
                $this->_view->renderizar('editar', 'productos');
                exit;
            }*/
            
            if(!$this->getTexto('nombre')){ //nombre del campo del view
                $this->_view->_error = 'debe introducir el nombre';
                $this->_view->renderizar('editar', 'productos');
                exit;
            }
            $this->_productos->editarProductos(
            $this->filtrarInt($codigo),
            
            $this->getPostParam('nombre'),
            $this->getPostParam('precio'),
            $this->getPostParam('marca'),
            $this->getPostParam('descuento'),
            $this->getPostParam('descripcion'),
            $this->getPostParam('tamanio')
                     );
            $this->redireccionar('productos');
        }
        
        $this->_view->datos = $this->_productos->getProductos($this->filtrarInt($codigo));
        $this->_view->renderizar('editar', 'productos');
   
            
        
    }
    
    public function insertar($codigo){
        $this->_view->titulo = 'Agregar a la lista';
        $this->_view->setJs(array('nuevo'));
        
        if(!$this->filtrarInt($codigo))
        {
            $this->redireccionar('productos');//si no es entero redirige a productos
        }
        if(!$this->_productos->getProductos($this->filtrarInt($codigo))){
             $this->redireccionar('productos');     
        }
         $this->_view->datos = $_POST;
        $this->_view->titulo = 'Insertar lista';
        $this->_view->setJs(array('nuevo'));
       
        //si se apreto guardar
         if($this->getInt('guardar') == 1){
            
            $this->_view->datos = $_POST;
           
            $user = Session::get('id');
            $this->_productos->insertarLista(
            $this->filtrarInt($user), $this->filtrarInt($codigo), $this->getPostParam('cantidad')
            
            );
         $this->_view->_mensaje = 'registro completado';   
        $this->redireccionar('productos'); 
        }
        
       // $this->_view->datos = $this->_productos->getProductos($this->filtrarInt($codigo));
       // $this->_view->renderizar('insertar', 'productos');
    }
    public function baja($codigo){
        $this->_view->titulo = 'Agregar a la lista';
        $this->_view->setJs(array('nuevo'));
        
        if(!$this->filtrarInt($codigo))
        {
            $this->redireccionar('productos');//si no es entero redirige a productos
        }
        if(!$this->_productos->getProductos($this->filtrarInt($codigo))){
             $this->redireccionar('productos');     
        }
      
           
            $this->_productos->bajaProd($this->filtrarInt($codigo));
         $this->_view->_mensaje = 'registro completado';   
        $this->redireccionar('productos'); 
    }
     
    
    public function alta($codigo){
        $this->_view->titulo = 'Agregar a la lista';
        $this->_view->setJs(array('nuevo'));
        
        if(!$this->filtrarInt($codigo))
        {
            $this->redireccionar('productos');//si no es entero redirige a productos
        }
        if(!$this->_productos->getProductos($this->filtrarInt($codigo))){
             $this->redireccionar('productos');     
        }
      
           
            $this->_productos->altaProd($this->filtrarInt($codigo));
         $this->_view->_mensaje = 'registro completado';   
        $this->redireccionar('productos'); 
    }
     
    }


?>