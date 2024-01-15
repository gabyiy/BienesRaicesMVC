<main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propriedad->titulo ;?></h1>
        <picture>
          
            <img loading="lazy" src="/imagenes/<?php echo $propriedad->imagen; ?>" alt="imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propriedad->precio;?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propriedad->wc ;?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propriedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propriedad->habitaciones; ?></p>
                </li>
            </ul>

         <p><?php echo $propriedad->descripcion; ?> </p>
        </div>
    </main>
