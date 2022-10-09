<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
	<div class="row align-items-center">
		<div class="col-5">
			<h4 class="page-title">LISTA</h4>
			<div class="d-flex align-items-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li>
						<li class="breadcrumb-item active" aria-current="page">Lista Profesores Activos</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">

    <h3 class="titularx">LISTA PROFESORES ACTIVOS</h3>
      
      <div class="">
        <div class="d-grid gap-2 d-md-block">          

          <?php echo form_open_multipart('profesor/listaxlsx'); ?>      
          <button type="button submit" class="btn btn-secondary">EXPORTAR LISTA PROFESORES EN EXCEL</button>
          <?php echo form_close(); ?>
            
        </div>
      </div>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Foto</th>
              <th scope="col">RDA</th>
              <th scope="col">Apellido Paterno</th>
              <th scope="col">Apellido Materno</th>
              <th scope="col">Nombres</th>
              <th scope="col">CI</th>
              <th scope="col">Especialidad</th>
              <th scope="col">Modificar</th>
              <th scope="col">Inactivar</th>
              <th scope="col">Eliminar</th>            
            </tr>
          </thead>
          <tbody class="txtable">
          <?php
          $indice=1;
          foreach ($profesores->result() as $row)
          {
            # code...
          ?>
            <tr>
              <th scope="row"><?php echo $indice; ?></th>
              <td scope="row">
                <?php
                $foto=$row->foto;
                if ($foto=="") {
                  ?>
                  <img src="<?php echo base_url(); ?>/uploads/user.jpg" alt="" width="75px">
                  <?php
                } else {
                  ?>
                  <img src="<?php echo base_url(); ?>/uploads/<?php echo $foto; ?>" alt="" width="75px">
                  <?php
                }
                ?>
              </td>
              <td><?php echo $row->rda; ?></td>
              <td><?php echo $row->apellidoPaterno; ?></td>
              <td><?php echo $row->apellidoMaterno; ?></td>
              <td><?php echo $row->nombres; ?></td>
              <td><?php echo $row->ci; ?></td>
              <td><?php echo $row->especialidad; ?></td>

              <td>
                <?php echo form_open_multipart("profesor/modificar"); ?>
                <input type="hidden" name="idProfesor" value="<?php echo $row->idProfesor; ?>">
                <input type="submit" name="buttonm" value="Modificar" class="btn btn-success">
                <?php echo form_close(); ?>
              </td>

              <td>
                <?php echo form_open_multipart("profesor/inactivarbd"); ?>
                <input type="hidden" name="idProfesor" value="<?php echo $row->idProfesor; ?>">
                <input type="submit" name="buttoni" value="Inactivar" class="btn btn-warning">
                <?php echo form_close(); ?>
              </td>

              <td>
                <?php echo form_open_multipart("profesor/eliminarbd"); ?>
                <input type="hidden" name="idProfesor" value="<?php echo $row->idProfesor; ?>">
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
