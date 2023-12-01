<?php

use App\Propriedad;

//fososim asta pentru a monstra doar un numar de proprietati

//daca suntem in pagina da anuncios sa ne arate toate proprietatile
//iar daca suntem in alta pagina sa ne arate doar cateva anunturi 

if($_SERVER["SCRIPT_NAME"]=== "/anuncios.php"){
    $propriedades =  Propriedad::all();

}else{
    $propriedades =  Propriedad::get(3);

}

?>



        <div class="contenedor-anuncios">
            <?php foreach( $propriedades as $proprieda){
                ?>
            <div class="anuncio">
                <picture>
                    <!-- <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg"> -->
                    <img loading="lazy" src="/imagenes/<?php echo $proprieda->imagen?>" alt="anuncio">
                </picture>

                <div class="contenido-anuncio">
                    <h3><?php echo $proprieda->titulo?></h3>
                    <p><?php echo $proprieda->descripcion?></p>
                    <p class="precio"><?php echo $proprieda->precio ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $proprieda->wc?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $proprieda->estacionamiento?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $proprieda->habitaciones?></p>
                        </li>
                    </ul>

                    <a href="anuncio.php?id=<?php echo  $proprieda->id?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!--.contenido-anuncio-->
            </div><!--anuncio-->
            <?php } ?>
            </div>

   