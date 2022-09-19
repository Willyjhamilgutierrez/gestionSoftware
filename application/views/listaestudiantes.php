<div class="container">
  <div class="row">
    <div class="col-md-12">

    <h3>LISTA ESTUDIANTES ACTIVOS</h3> 

      <a href="<?php echo base_url(); ?>" class="btn btn-danger text-white">Volver</a>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>              
              <th scope="col">Apellido Paterno</th>
              <th scope="col">Apellido Materno</th>
              <th scope="col">Nombres</th>
              <th scope="col">Curso</th>
              <th scope="col">Edad</th>
              <th scope="col">Nota</th>
              <th scope="col">Modificar</th>
              <th scope="col">Inactivar</th>
              <th scope="col">Eliminar</th>            
            </tr>
          </thead>
          <tbody>
          <?php
          $indice=1;
          foreach ($estudiantes->result() as $row)
          {
            # code...
          ?>
            <tr>
              <th scope="row"><?php echo $indice; ?></th>              
              <td><?php echo $row->apellidoPaterno; ?></td>
              <td><?php echo $row->apellidoMaterno; ?></td>
              <td><?php echo $row->nombres; ?></td>
              <td><?php echo $row->curso; ?></td>
              <td><?php echo $row->edad; ?></td>
              <td><?php echo $row->nota; ?></td>

              <td>
                <?php echo form_open_multipart("estudiante/modificar"); ?>
                <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
                <input type="submit" name="buttonm" value="Modificar" class="btn btn-success">
                <?php echo form_close(); ?>
              </td>

              <td>
                <?php echo form_open_multipart("estudiante/inactivarbd"); ?>
                <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
                <input type="submit" name="buttoni" value="Inactivar" class="btn btn-warning">
                <?php echo form_close(); ?>
              </td>

              <td>
                <?php echo form_open_multipart("estudiante/eliminarbd"); ?>
                <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
                <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger">
                <?php echo form_close(); ?>
              </td>
            </tr>   
          <?php
          $indice++;
          }
          ?>                 
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>
