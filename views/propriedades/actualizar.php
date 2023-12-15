
<main class="contenedor seccion">
        <h1>Actualizar Propriedad</h1>
        <?php 
        //facem for echo ca sa faca un loop prin toate ororile
     foreach($errores as $error): ?>
     <div class="alerta error"><?php echo  $error ;?></div>
   
      <?php endforeach ;?>
      <a href="/admin" class="boton boton-verde">Volver</a>
        <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include  __DIR__ . "/formulario.php"; ?>
        <input type="submit" value="Actualizar Propriedad Proprieda" class="boton boton-verde">

        </form>

</main>