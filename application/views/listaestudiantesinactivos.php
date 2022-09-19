<div class="container">
  <div class="row">
    <div class="col-md-12">

    <h1>LISTA DE ESTUDIANTES INACTIVADOS</h1>      

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>            
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Nombres</th>
            <th scope="col">Curso</th>
            <th scope="col">Edad</th>
            <th scope="col">NOTA</th>
            <th scope="col">Activar</th>            
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
              <?php echo form_open_multipart("estudiante/activarbd"); ?>
              <input type="hidden" name="idEstudiante" value="<?php echo $row->idEstudiante; ?>">
              <input type="submit" name="buttoni" value="Activar" class="btn btn-dark">
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
