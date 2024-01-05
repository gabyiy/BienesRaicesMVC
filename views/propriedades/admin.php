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

        <a href="/propriedades/crear" class="boton boton-verde">Nueva Propriedad</a>
        <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo(a) Vendedor</a>

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
                    <form  method="POST" class="w-100" action="/propriedades/eliminar">

                    <!-- aici folosim un input cu id proprietati pe care dorim sa o eliminam
                 folosim type hidden ca sa ne ascunda input si sa nu apara valoarea -->
                <input type="hidden" name="id" value="<?php  echo $propriedad->id;?>">
                <input type="hidden" name="tipo" value="proprieda">

                    <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>

                    <!-- Asa specificam la proprieda vrem sa merge ca sa actualizam trecandui idul -->
                    <a href="/propriedades/actualizar?id=<?php echo $propriedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
        </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
        </table>
        <h2>Vendedores</h2>
        <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
             

        </tr>

        </thead>
        <!-- Monstram datele care sunt salvate intru obict( de asta folosim foreach)-->
        <tbody>
            <?php foreach($vendedores as $vendedor): ?>

            <tr>
                <td><?php echo $vendedor->id;?></td>
                <td><?php echo $vendedor->nombre . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>

                <td>
                    <form method="POST" class="w-100" action="/vendedores/eliminar">

                    <!-- aici folosim un input cu id proprietati pe care dorim sa o eliminam
                 folosim type hidden ca sa ne ascunda input si sa nu apara valoarea -->
                <input type="hidden" name="id" value="<?php  echo $vendedor->id;?>">
                <input type="hidden" name="tipo" value="vendedor">

                    <input type="submit" class="boton-rojo-block" value="Eliminar">

            </form>

                    <!-- Asa specificam la proprieda vrem sa merge ca sa actualizam trecandui idul -->
                    <a href="/vendedores/actualizar?id=<?php echo $propriedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
        </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
        </table>
            </main>