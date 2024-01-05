<main class="contenedor seccion">
<h1>Actualizar vendedores(a)</h1>

<a href="/admin/index.php" class="boton boton-verde">Volver al index</a>

<?php 
//facem for echo ca sa faca un loop prin toate ororile
foreach($errores as $error): ?>
<div class="alerta error"><?php echo  $error ;?></div>

<?php endforeach ;?>
<!-- pentru a adauga fisiere imagini etc adaugam la formular enctype -->
<form method="POST"  class="formulario" enctype="multipart/form-data">

<!-- aici adaugam formularul care il avem in tamplate -->

<?php include "formulario.php"?>
<input type="submit" value="Guardar cambios " class="boton boton-verde">
</form>
</main>