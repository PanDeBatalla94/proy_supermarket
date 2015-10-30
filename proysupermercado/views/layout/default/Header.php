<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmls="http://www.w3.or/1999/xhtml">
    <head>
        <title>
            <?php
            if(isset( $this->titulo))
            echo $this->titulo; ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <link href ="<?php echo $_layoutParams['ruta_css']; ?>estilos.css" rel="stylesheet" type="text/css" />
        <link href ="<?php echo $_layoutParams['ruta_css']; ?>menu.css" rel="stylesheet" type="text/css" media="screen" />
        
        <script src="<?php echo BASE_URL; ?>public/js/jquery.js" type="text/javascript" > </script>
        <script src="<?php echo BASE_URL; ?>public/js/jquery.validate.js" type="text/javascript" > </script>
        <script src="<?php echo BASE_URL; ?>public/js/script.js" type="text/javascript" > </script>
 <?php if(isset($_layoutParams['js']) && count($_layoutParams['js'])):      
       ?>
        <?php for($i=0 ; $i < count($_layoutParams['js']); $i++): ?>
        <script src="<?php echo $_layoutParams['js'][$i] ?>" type="text/javascript" ></script>
        
         <?php endfor; ?>
            <?php endif; ?>
    </head>
     <body>
        <!-- <body>
         <div id="main">
             <div id="header">
                     <div id="logo">
                        <h1><?php echo APP_NAME; ?></h1>
                    </div> -->
        
        <div id="title">
  <div id="title1"><?php echo APP_NAME; ?></div>
  <br> <br><?php echo "Bienvenido!!"; echo Session::get('usuario'); ?>
</div>
           
             
          <!--   <div id="menu">
             <div id="top_menu">
                 <ul> -->
          
          <div id="main1">
          <ul id="menu2">
              
          <li><a href="#" class="drop">Acerca de nosotros</a>
         <div class="dropdown_2columns">
        <!-- Begin 2 columns container -->
        <div class="col_2">
          <h2>Bienvenido!</h2>
        </div>
        <div class="col_2">
          <p>Hi and welcome here ! This is a showcase of the possibilities of this awesome Mega Drop Down Menu.</p>
          <p>This item comes with a large range of prepared typographic stylings such as headings, lists, etc.</p>
        </div>
        <div class="col_2">
          <h2>Cross Browser Support</h2>
        </div>
        
        <div class="col_1">
          <p>This mega menu has been tested in all major browsers.</p>
        </div>
      </div>      
              
                     <?php if(isset($_layoutParams['menu'])):?>
                     <?php for($i = 0; $i < count($_layoutParams['menu']); $i++ ): ?>
                    <?php 

                            if($item && $_layoutParams['menu'][$i]['id'] == $item ){ 
                            $_item_style = 'current'; 
                            } else {
                            $_item_style = '';
                            }

                            ?> 
              <li><a href="#" class="drop"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a>
                
                  <div class="dropdown_1column align_right">
                 <div class="col_1">
                  <ul class="simple">
                  
                  
                  <li><a class="<?php echo $_item_style; ?>" href="<?php echo $_layoutParams['menu'][$i]['enlace']; ?>"><?php  echo $_layoutParams['menu'][$i]['titulo']; ?></a></li>
                    
                </ul>
        </div>
      </div>         
                        
                        <?php endfor;?>
                     <?php endif;?>
                     
           </div>     
     
          
    <div id="gallery">
    <div id="slides">
        <div class="slide"><img src="img/sample_slides/macbook.jpg" width="920" height="400" alt="side"/></div>
      <div class="slide"><img src="../img/sample_slides/iphone.jpg" width="920" height="400" alt="side" /></div>
      <div class="slide"><img src="../img/sample_slides/imac.jpg" width="920" height="400" alt="side" /></div>
      <div class="slide"><img src="../img/sample_slides/info.jpg" width="920" height="400" alt="side" /></div>
    </div>
    <div id="menu1">
      <ul>
        <li class="fbar">&nbsp;</li>
        <li class="menuItem"><img src="../img/sample_slides/thumb_macbook.png" alt="thumbnail" /></li>
        <li class="menuItem"><img src="../img/sample_slides/thumb_iphone.png" alt="thumbnail" /></li>
        <li class="menuItem"><img src="../img/sample_slides/thumb_imac.png" alt="thumbnail" /></li>
        <li class="menuItem"><img src="../img/sample_slides/thumb_about.png" alt="thumbnail" /></li>
      </ul>
  </div>              
    </div>        
                  
                  
                     
                     
                     
             <!--    </ul>
             </div>
                 </div>-->
            
             <div id="content"> 
                 <noscript><p>Para el correcto funcionamiento debe habilitar javascript </p></noscript>
             
                 <?php if(isset($this->_error)):  ?>
                 <div id="error"><?php echo $this->_error;?></div>
                 <?php endif; ?>

                 <?php if(isset($this->_mensaje)):  ?>
                 <div id="mensaje"><?php echo $this->_mensaje;?></div>
                 <?php endif; ?>
    