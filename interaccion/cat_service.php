<?php
    include_once ("../dao/conexion.php");

    $sql_todos="SELECT idtbl_service FROM tbl_service";
    $consulta_todos=$pdo->prepare($sql_todos);
    $consulta_todos->execute();
    $resultados_todos=$consulta_todos->fetchALL(PDO::FETCH_ASSOC);
    $todos=count($resultados_todos);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Shop product list - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap_catalogue.css" rel="stylesheet">
    <link href="catalogue.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- SE INCLUYERON YA LAS 2 HOJAS DE ESTILOS, LA DE CATALOGUE.CSS QUE ES EDITABLE PARA ESTA SECCION
    Y LA DE BOOTSTRAP QUE BUENO, ES LA QUE USAMOS POR DEFECTO-->
</head>
<body>
<div class="container">
    <!-- <div class="col-md-3"> -->
        
        
        <!--
        <section class="panel">
            <header class="panel-heading">
                Category
            </header>
            <div class="panel-body">
                <ul class="nav prod-cat">
                    <li>
                        <a href="#" class="active"><i class="fa fa-angle-right"></i> Dress</a>
                        <ul class="nav">
                            <li class="active"><a href="#">- Shirt</a></li>
                            <li><a href="#">- Pant</a></li>
                            <li><a href="#">- Shoes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Bags &amp; Purses</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Beauty</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Coat &amp; Jacket</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Jeans</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Jewellery</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Electronics</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Sports</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Technology</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Watches</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-angle-right"></i> Accessories</a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Price Range
            </header>
            <div class="panel-body sliders">
                <div id="slider-range" class="slider"></div>
                <div class="slider-info">
                    <span id="slider-range-amount"></span>
                </div>
            </div>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Filter
            </header>
            <div class="panel-body">
                <form role="form product-form">
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>Wallmart</option>
                            <option>Catseye</option>
                            <option>Moonsoon</option>
                            <option>Textmart</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">Wallmart</span></span>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>White</option>
                            <option>Black</option>
                            <option>Red</option>
                            <option>Green</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">White</span></span>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control hasCustomSelect" style="-webkit-appearance: menulist-button; width: 231px; position: absolute; opacity: 0; height: 34px; font-size: 12px;">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                        </select>
                        <span class="customSelect form-control" style="display: inline-block;"><span class="customSelectInner" style="width: 209px; display: inline-block;">Small</span></span>
                    </div>
                    <button class="btn btn-primary" type="submit">Filter</button>
                </form>
            </div>
        </section>



        
        <section class="panel">
            <header class="panel-heading">
                Best Seller
            </header>
            <div class="panel-body">
                <div class="best-seller">
                    <article class="media">
                        <a class="pull-left thumb p-thumb">
                            <img src="https://via.placeholder.com/250x220/FFB6C1/000000" />
                        </a>
                        <div class="media-body">
                            <a href="#" class="p-head">Item One Tittle</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media">
                        <a class="pull-left thumb p-thumb">
                            <img src="https://via.placeholder.com/250x220/A2BE2/000000" />
                        </a>
                        <div class="media-body">
                            <a href="#" class="p-head">Item Two Tittle</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                    <article class="media">
                        <a class="pull-left thumb p-thumb">
                            <img src="https://via.placeholder.com/250x220/6495ED/000000" />
                        </a>
                        <div class="media-body">
                            <a href="#" class="p-head">Item Three Tittle</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        -->

    
    </div>
    
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                <div class="pull-right">
                    <ul class="pagination pagination-sm pro-page-list">
                        <li><a href="#">Mira nuestras etiquetas</a></li>
                    </ul>
                </div>
                <div class="pull-left">
                    <ul class="pagination pagination-sm pro-page-list">
                        <li><a href="#">Filtro</a></li>
                        <li><a href="#">Etiquetas</a></li>
                        <li><a href="#">Precio</a></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <div class="buscar-center">
                        <input type="text" placeholder="Buscar" class="form-control" />
                    </div>
                </div>
            </div>
        </section>
        <div class="row product-list">

           <?php 
                if ($todos>=1) {
                    for ($i=1;$i<=$todos;$i++){
                        $sql_service="SELECT * FROM tbl_service WHERE idtbl_service=:id";
                        $consulta_service=$pdo->prepare($sql_service);
                        $consulta_service->bindparam(':id',$i);
                        $consulta_service->execute();
                        $resultados_service=$consulta_service->fetch(PDO::FETCH_ASSOC);
                        $service=$resultados_service;
            ?>
            <div class="col-md-4">
                <section class="panel">
                    <div class="pro-img-box">
                        <img src=<?php //echo $resultados['foto'][$nresultados];?> alt="" />
                        <a href="service.php:? <?php echo $service['idtbl_service'];?>" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                    <div class="panel-body text-center">
                        <h4>
                            <a href="service.php:? <?php echo $service['idtbl_service'];?>" class="pro-title">
                            <?php echo $service['nombre_servicio'];?>
                            </a>
                        </h4>
                        <p class="price"> <?php echo $service['precio'];?></p>
                    </div>
                </section>
            </div>
            <?php
                    } 
                }else {
            ?>  
            <div class="col-md-4">
                <section class="panel">
                    <div class="panel-body text-center">
                        <h4>
                            <?php echo "No hay resultados";?>
                        </h4>
                    </div>
                </section>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>