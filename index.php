


<?php 


include("inc/head.php");
include("inc/menu.php");

?>


<main class="content">

<div class="card" style="width: 18rem;">
  <img src=<?php echo $_SESSION['foto']?> style="heigth:100px !important" class="card-img-top" alt="Sara">
  <div class="card-body">
    <h3 class="card-title text-center"><?php echo $_SESSION['usuario']?></h3>
    <h4 class="card-title text-center"><?php echo $_SESSION['cargo']?></h4>
    <a style="margin-left:auto;margin-rigth:auto" href="#" class="btn btn-primary">ver perfil</a>
  </div>
</div>
	
</main>
			

<?php 
include("inc/footer.php");

?>