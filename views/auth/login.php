<main class="contenedor seccion contenido-centrado">
<h3>Inicar session</h3>

<?php 
    foreach($errores as $error):?>
    
    <div class="alerta error"><?php  echo $error;?></div>
    <?php endforeach;?>
<!-- asa trimitem datele catre ruta post login din index -->
<form method="POST" action="/login">
<fieldset>
                <legend>Email and password</legend>

                <label for="email">E-mail</label>
                <!-- punem required cand vrem sa fie obligatoriu introducerea datelor in input -->
                <input type="email" placeholder="Tu Email" name="email" id="email" >


                <label for="pasword">Mensaje:</label>
                <input type="number" id="password" name="password" placeholder="Entra tu password" >
            </fieldset>
            <input type="submit" value="Enviar" class="boton boton-verde">

</form>


</main>