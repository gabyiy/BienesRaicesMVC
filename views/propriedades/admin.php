<main class="contenedor seccion">
        <h1>Adminstrador de bienes raices</h1>
        <!-- aici salvam in mensaj ce primim de la functia mostrarNotificacion la care in acelasi timp
        ii trimititem ce rezultam primim de la form -->
        <?php 

    if($resultado){
        $mensaje = mostrarNotificacion(intval( $resultado));
        if ($mensaje){  ?>

        <p class="alerta exito"><?php echo s($mensaje)?></p>
 <?php  }  ?>
<?php } ?>

        <a href="/propriedades/crear.php" class="boton boton-verde">Nueva Propriedad</a>
        <a href="/vendedores/crear.php" class="boton boton-amarillo">Nuevo(a) Vendedor</a>

        <h2>Propriedades</h2>
        <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th></Prog>Pecio</th>
                <th>Aciones</th>

        </tr>

        </thead>
        <!-- Monstram datele care sunt salvate intru obict( de asta folosim foreach)-->
        <tbody>
            <?php foreach($propriedades as $propriedad): ?>

            <tr>
                <td><?php echo $propriedad->id;?></td>
                <td><?php echo $propriedad->titulo; ?></td>
                <td><img src="../imagenes/<?php echo  $propriedad->imagen;?>" class="imagen-tabla" alt=""></td>
                <td><?php echo $propriedad->precio;?></td>
                <td>
                    <form action="" method="POST" class="w-100">

                    <!-- aici folosim un input cu id proprietati pe care dorim sa o eliminam
                 folosim type hidden ca sa ne ascunda input si sa nu apara valoarea -->
                <input type="hidden" name="id" value="<?php  echo $propriedad->id;?>">
                <input type="hidden" name="tipo" value="proprieda">

                    <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>

                    <!-- Asa specificam la proprieda vrem sa merge ca sa actualizam trecandui idul -->
                    <a href="/admin/propriedades/actualizar.php?id=<?php echo $propriedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
        </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
        </table>
            </main>