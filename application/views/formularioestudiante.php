<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>AGREGAR ESTUDIANTE</h2>

      <a href="<?php echo base_url(); ?>" class="btn btn-danger text-white">Volver</a>

      <?php echo form_open_multipart('estudiante/agregarbd'); ?>

      <form class="row g-3 needs-validation" novalidate>        
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Apellido Paterno</label>
          <input type="text" name="apellidoPaterno" class="form-control" id="validationCustom01" value="" required>
          <div class="valid-feedback">
            ¡Que bien!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Apellido Materno</label>
          <input type="text" name="apellidoMaterno" class="form-control" id="validationCustom02" value="" required>
          <div class="valid-feedback">
            ¡Que bien!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Nombres</label>
          <input type="text" name="nombres" class="form-control" id="validationCustom02" value="" required>
          <div class="valid-feedback">
            ¡Que bien!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">Curso de aprendizaje</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">Curso</span>
            <input type="text" name="curso" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Ingrese el curso del estudiante
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom03" class="form-label">Edad</label>
          <input type="text" name="edad" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
            Ingrese la edad del estudiante
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">Nota de calificación</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">NOTA</span>
            <input type="text" name="nota" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Por favor ingrese su RDA.
            </div>
          </div>
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">AGREGAR ESTUDIANTE</button>
        </div>
      </form>
      
      <?php echo form_close(); ?>
      
    </div>
  </div>
</div>
