<?php
require_once 'Listdb.inc.php';
require_once 'function.php';
$xx = get_publicsh_work();
?>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<div class="container">
  <h2>Carousel Example</h2>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
      
    <div class="carousel-inner">
        <?php foreach($xx as $a_work):?>
      <div id="b" class="item">
        <img src="<?php echo $a_work['image_path'];?>" alt="a" style="width:100%;">
      </div>
      <?php endforeach;?>
    </div>
           <?php// endforeach;?>
      

      
   

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<script>
    $(function(){
	 $('.carousel').carousel({
	interval: 1000
	 });
	});
    $(document).on("ready",function(){
        $("#b").addClass("item active")
        
    })
</script>
    <style>
.carousel .carousel-inner {
    height: 250px;
    position: absolute;     /*往中間調*/
    top: -50px;
      
}

.carousel .carousel-inner img {
    
  min-height: 250px;
  max-height: 250px;
  object-fit: fill;
}
.left carousel-control{
    bottom: 500px;  
}       
        
        
</style>

