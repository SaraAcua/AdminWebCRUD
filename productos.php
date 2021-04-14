
<?php 

include("inc/head.php");
include("inc/menu.php");

?>


<main class="content">
<div class="container-fluid p-0">
<div class="card">
<div class="card-body">
<form class="needs-validation" novalidate>
  <div class="row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Descripcion</label>
      <input type="text" class="form-control" id="descripcionproducto" placeholder="Descripcion"  required>
      <div class="invalid-feedback">
      Ingrese un Dato Valido
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Foto</label>
      
        <input type="file" class="form-control" id="fotoproducto" placeholder="Foto" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
        Ingrese un Dato Valido
        </div>
  
    </div>
  </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Categoria</label>
      <input type="text" class="form-control" id="categoriaproductos" placeholder="Categoria"  required>
      <div class="invalid-feedback">
      Ingrese un Dato Valido
      </div>
    </div>
    
  <button onclick="AdicionarProductos()"  class="btn btn-primary" type="submit">Guardar</button>

  
</form>



</div>
</div>
</div>




<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>




	
</main>

			

<?php 
include("inc/footer.php");

?>