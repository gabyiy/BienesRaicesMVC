<main class="contenedor seccion">
<h1>Registrar vendedores</h1>

<a href="/admin/index.php" class="boton boton-verde">Volver al index</a>

<?php 
//facem for echo ca sa faca un loop prin toate ororile
foreach($errores as $error): ?>
<div class="alerta error"><?php echo  $error ;?></div>

<?php endforeach ;?>
<!-- pentru a adauga fisiere imagini etc adaugam la formular enctype 
Pentru a a trimite datele la fuctiile din vendedorCotroller trebuie sa adaugam la action ruta functiei respective-->
<form method="POST" action="/vendedores/crear" class="formulario" enctype="multipart/form-data">

<!-- aici adaugam formularul care il avem in tamplate -->

<?php include "formulario.php"?>
<input type="submit" value="Registrar Vendedor" class="boton boton-verde">
</form>
</main>