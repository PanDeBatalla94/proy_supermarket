<?php
class indexController extends Controller
{
   public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $post = $this->loadModel('productos');
        $this->_view->productoss = $post->getProductoss();
        $this->_view->titulo = 'Portada';
        $this->_view->renderizar('index', 'inicio');
    }
}
?>

