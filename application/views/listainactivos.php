<div class="container">
  <div class="row">
    <div class="col-md-12">

    <h1>LISTA DE PROFESORES INACTIVADOS</h1>

    <a href="<?php echo base_url(); ?>" class="btn btn-danger text-white">Volver</a>

      <?php echo form_open_multipart('profesor/index'); ?>
      <button type="submit" class="btn btn-dark">VER LISTA DE USUARIOS ACTIVOS</button>
      <?php echo form_close(); ?>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">RDA</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Nombres</th>
            <th scope="col">CI</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Activar</th>            
          </tr>
        </thead>
        <tbody>
        <?php
        $indice=1;
        foreach ($profesores->result() as $row)
        {
          # code...
        ?>
          <tr>
            <th scope="row"><?php echo $indice; ?></th>
            <td><?php echo $row->rda; ?></td>
            <td><?php echo $row->apellidoPaterno; ?></td>
            <td><?php echo $row->apellidoMaterno; ?></td>
            <td><?php echo $row->nombres; ?></td>
            <td><?php echo $row->ci; ?></td>
            <td><?php echo $row->especialidad; ?></td>

            <td>
              <?php echo form_open_multipart("profesor/activarbd"); ?>
              <input type="hidden" name="idProfesor" value="<?php echo $row->idProfesor; ?>">
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
