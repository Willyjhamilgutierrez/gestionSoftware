<div class="container">
  <main class="text-center">

    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="<?php echo base_url(); ?>img/logo.svg" alt="" width="72" height="57">
      <h2>LOGIN DE USUARIOS</h2>
      <p class="lead">El sistema intenta ayudar a cada maestro con la tarea de calificación de notas.</p>
    </div>

    <?php 
    switch ($msg) {
      case '1':
        $mensaje="Gracias por utilizar nuestro sistema";
        break;

      case '2':
        $mensaje="Usuario no identificado";
        break;

      case '3':
        $mensaje="Acceso no válido - Debe inicar sesión";
        break;
      
      default:
        $mensaje="";
        break;
    }
    ?>

    <h1 class="text-danger"><?php echo $mensaje; ?></h1>

    <?php echo form_open_multipart('usuarios/validar'); ?>
      
      <h1 class="h3 mb-3 fw-normal">Por favor inicie sesión</h1>

      <div class="form-floating col-md-3 mx-auto mb-3">
        <input type="text" class="form-control" id="floatingInput" name="login">
        <label for="floatingInput">Nombre de usuario</label>
      </div>
      <div class="form-floating col-md-3 mx-auto mb-3">
        <input type="password" class="form-control" id="floatingPassword" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <br>
      <button class="w-30 btn btn-lg btn-primary" type="submit" name="buttonlogin">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>

    <?php echo form_close(); ?>

  </main>

</div>