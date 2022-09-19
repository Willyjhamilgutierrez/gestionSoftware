<div class="container">
  <div class="row">
    <div class="col-md-12">

    <h3>LISTA ESTUDIANTES ACTIVOS</h3>
      
      <?php echo form_open_multipart('estudiante/verinactivos'); ?>
      <button type="submit" class="btn btn-dark float-left">VER LISTA DE ESTUDIANTES INACTIVADOS</button>
      <?php echo form_close(); ?>

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