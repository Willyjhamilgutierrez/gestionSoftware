<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>MODIFICAR DATOS DEL PROFESOR</h2>

    <?php

    foreach ($infoprofesor->result() as $row) 
    {        
    
      echo form_open_multipart('profesor/modificarbd'); 
      
      ?>    

      <form class="row g-3 needs-validation" novalidate>
        
      <input type="hidden" name="idProfesor" value="<?php echo $row->idProfesor; ?>">

        <div class="col-md-4">
          <label for="validationCustomUsername" class="form-label">Registro de Docente Administrativo</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">RDA</span>
            <input type="text" name="rda" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $row->rda; ?>" required>
            <div class="invalid-feedback">
              Por favor ingrese su RDA.
            </div>
          </div>
        </div>
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
          <label for="validationCustomUsername" class="form-label">Carnet de Identidad</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">CI</span>
            <input type="text" name="ci" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo $row->ci; ?>" required>
            <div class="invalid-feedback">
              Por favor ingrese un número de CI.
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationEspecialidad" class="form-label">Especialidad</label>
          <input type="text" name="especialidad" class="form-control" id="validationEspecialidad" value="<?php echo $row->especialidad; ?>" required>
          <div class="invalid-feedback">
            Por favor ingrese su especialidad (Primaria / Secundaria-Materia).
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationFoto" class="form-label">Foto de Perfil</label>
          <input type="file" name="userfile" class="form-control" id="validationFoto" value="<?php echo $row->foto; ?>">
          <div class="invalid-feedback">
            Por favor suba su foto de perfil.
          </div>
        </div>
        <br>
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