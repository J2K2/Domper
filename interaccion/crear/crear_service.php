<?php
    include_once ('../../dao/conexion.php');
    if ($_POST) {
        //datos de usuario
        $nom_ser = $_POST['nom_ser'];
        $codigo = $_POST['codigo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];

        $sql_ins = "INSERT INTO tbl_service (nombre_servcio,cod_service,precio,descripcion)
        values (?,?,?,?)";
        $consulta_sql_ins = $pdo->prepare($sql_ins);
        $consulta_sql_ins -> execute(array($nom_ser,$codigo,$precio,$descripcion));
        var_dump($consulta_sql_ins);
        header("Location: ../../usuario/perfil/perfil_trabajador.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="../product_styles.css" rel="stylesheet">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="col-sm-12 col-md-12 col-lg-12">
    <!-- product -->
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="item active">
                                <img src="https://via.placeholder.com/700x400/FFB6C1/000000" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 2 -->
                            <div class="item">
                                <img src="https://via.placeholder.com/700x400/87CEFA/000000" class="img-responsive" alt="" />
                            </div>
                            <!-- Slide 3 -->
                            <div class="item">
                                <img src="https://via.placeholder.com/700x400/B0C4DE/000000" class="img-responsive" alt="" />
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
                        <a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name">
                    <label>Nombre del servicio</label>
                    <input type="text" name="nom_ser">
                    <!--<i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-primary"></i>
                    <i class="fa fa-star fa-2x text-muted"></i>
                    <span class="fa fa-2x"><h5>(109) Votes</h5></span>
                    <a href="javascript:void(0);">109 customer reviews</a>
                    -->
                </h2>
                <hr />
                <h3 class="price-container"><label>Precio</label>
                    <input type="number" name="precio">
                    <small>*Incluye impuestos</small>
                </h3>
                <!--
                <div class="certified">
                    <ul>
                        <li>
                            <a href="javascript:void(0);">Tiempo llegada estimado<span>7 dias</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Certified<span>Quality Assured</span></a>
                        </li>
                    </ul>
                </div>
                <hr />
                -->
                <div class="description description-tabs">
                    <!--<ul id="myTab" class="nav nav-pills">
                        <li class="active"><a href="#more-information" data-toggle="tab" class="no-margin">Product Description </a></li>
                        <li class=""><a href="#specifications" data-toggle="tab">Specifications</a></li>
                        <li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li>
                    </ul>-->
                    <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="more-information">
                            <br />
                            <strong>Código del servicio:</strong>
                            <p><input type="number" name="codigo"></p>
                            <hr>
                            <strong>Descripción</strong>
                            <p><input type="text" name="descripcion"></p>
                        </div>
                        <!--<div class="tab-pane fade" id="specifications">
                            <br />
                            <dl class="">
                                <dt>Gravina</dt>
                                <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                <dd>Eget lacinia odio sem nec elit.</dd>
                                <br />

                                <dt>Test lists</dt>
                                <dd>A description list is perfect for defining terms.</dd>
                                <br />

                                <dt>Altra porta</dt>
                                <dd>Vestibulum id ligula porta felis euismod semper</dd>
                            </dl>
                        </div>-->
                        <!-- 
                        <div class="tab-pane fade" id="reviews">
                            <br />
                            <form method="post" class="well padding-bottom-10" onsubmit="return false;">
                                <textarea rows="2" class="form-control" placeholder="Write a review"></textarea>
                                <div class="margin-top-10">
                                    <button type="submit" class="btn btn-sm btn-primary pull-right">
                                        Submit Review
                                    </button>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Location"><i class="fa fa-location-arrow"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Voice"><i class="fa fa-microphone"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add Photo"><i class="fa fa-camera"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-link profile-link-btn" rel="tooltip" data-placement="bottom" title="" data-original-title="Add File"><i class="fa fa-file"></i></a>
                                </div>
                            </form>

                            <div class="chat-body no-padding profile-message">
                                <ul>
                                    <li class="message">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="online" />
                                        <span class="message-text">
                                            <a href="javascript:void(0);" class="username">
                                                Alisha Molly
                                                <span class="badge">Purchase Verified</span>
                                                <span class="pull-right">
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-muted"></i>
                                                </span>
                                            </a>
                                            Can't divide were divide fish forth fish to. Was can't form the, living life grass darkness very image let unto fowl isn't in blessed fill life yielding above all moved
                                        </span>
                                        <ul class="list-inline font-xs">
                                            <li>
                                                <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was helpful (22)</a>
                                            </li>
                                            <li class="pull-right">
                                                <small class="text-muted pull-right ultra-light"> Posted 1 year ago </small>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="message">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="online" />
                                        <span class="message-text">
                                            <a href="javascript:void(0);" class="username">
                                                Aragon Zarko
                                                <span class="badge">Purchase Verified</span>
                                                <span class="pull-right">
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                    <i class="fa fa-star fa-2x text-primary"></i>
                                                </span>
                                            </a>
                                            Excellent product, love it!
                                        </span>
                                        <ul class="list-inline font-xs">
                                            <li>
                                                <a href="javascript:void(0);" class="text-info"><i class="fa fa-thumbs-up"></i> This was helpful (22)</a>
                                            </li>
                                            <li class="pull-right">
                                                <small class="text-muted pull-right ultra-light"> Posted 1 year ago </small>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                -->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <input type="submit" class="btn btn-success btn-lg" value="Crear"></a>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="btn-group pull-right">
                            <!--<button class="btn btn-white btn-default"><i class="fa fa-star"></i> Marcar</button>-->
                            <button class="btn btn-white btn-default"><i class="fa fa-arrow-left"></i> Volver</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product -->
</div>



<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>