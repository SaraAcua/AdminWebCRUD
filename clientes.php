


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
      <label for="validationCustom01">Nombres</label>
      <input type="hidden" class="form-control" id="idcliente">
      <input type="text" class="form-control" id="nombrecliente" placeholder="Nombres"  required>
      <div class="invalid-feedback">
      Ingrese un Dato Valido
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Apellidos</label>
      <input type="text" class="form-control" id="apellidocliente" placeholder="Apellidos"  required>
      <div class="invalid-feedback">
      Ingrese un Dato Valido
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Foto</label>
      
        <input type="text" class="form-control" id="fotocliente" placeholder="Foto" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">
        Ingrese un Dato Valido
        </div>
  
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">Direccion</label>
      <input type="text" class="form-control" id="direccioncliente" placeholder="Direccion" required>
      <div class="invalid-feedback">
        Ingrese un Dato Valido
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Ciudad</label>
      <input type="text" class="form-control" id="ciudadcliente" placeholder="Ciudad" required>
      <div class="invalid-feedback">
      Ingrese un Dato Valido
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Telefono</label>
      <input type="text" class="form-control" id="telefonocliente" placeholder="Telefono" required>
      <div class="invalid-feedback">
      Ingrese un Dato Valido
      </div>
    </div>
  </div>

  <button onclick="AdicionarCliente();" class="btn btn-primary" type="submit">Guardar</button>
</form>



</div>
</div>
</div>

<!--Listas de clientes-->

<div class="container-fluid p-0">
<div class="card">
<div class="card-body">


<table id="tablaclientes" class="table table-hover my-0" >
<thead>
<tr>

<th>Nombre</th>
<th>Apellido</th>
<th>Foto</th>
<th>Direccion</th>
<th>Ciudad</th>
<th>Telefono</th>
<th>Acciones</th>


</tr>
</thead>
<tbody>

</tbody>

</table>

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