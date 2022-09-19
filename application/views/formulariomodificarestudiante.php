<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>MODIFICAR DATOS DEL PROFESOR</h2>

    <?php

    foreach ($infoestudiante->result() as $row) 
    {        
    
      echo form_open_multipart('estudiante/modificarbd'); 
      
      ?>    

      <form class="row g-3 needs-validation" novalidate>
        
      <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
        
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Apellido Paterno</label>
          <input type="text" name="apellidoPaterno" class="form-control" id="validationCustom01" value="<?php echo $row->apellidoPaterno; ?>" required>
          <div class="valid-feedback">
            ¡Que bien!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Apellido Materno</label>
          <input type="text" name="apellidoMaterno" class="form-control" id="validationCustom02" value="<?php echo $row->apellidoMaterno; ?>" required>
          <div class="valid-feedback">
            ¡Que bien!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Nombres</label>
          <input type="text" name="nombres" class="form-control" id="validationCustom02" value="<?php echo $row->nombres; ?>" required>
          <div class="valid-feedback">
            ¡Que bien!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">Curso de aprendizaje</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">Curso</span>
            <input type="text" name="curso" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $row->curso; ?>" required>
            <div class="invalid-feedback">
              Por favor ingrese el curso.
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Edad</label>
          <input type="text" name="edad" class="form-control" id="validationCustom03" value="<?php echo $row->edad; ?>" required>
          <div class="invalid-feedback">
            Por favor ingrese la edad del estudiante
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">Nota de calificación</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">NOTA</span>
            <input type="text" name="nota" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $row->nota; ?>" required>
            <div class="invalid-feedback">
              Por favor ingrese la NOTA.
            </div>
          </div>
        </div>
        
        <div class="col-12">
          <button type="submit" class="btn btn-primary">GUARDAR MODIFICACIONES</button>
        </div>
      </form>
      
      <?php 
      
      echo form_close();
      
    }
    ?>

    </div>
  </div>
</div>