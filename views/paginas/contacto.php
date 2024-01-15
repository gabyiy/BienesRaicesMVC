<main class="contenedor seccion">
        <h1>Contacto</h1>

      
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">

        <h2>Llene el formulario de Contacto</h2>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="contacto[email]" required>

                <label for="telefono">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="telefono" name="contacto[telefono]">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <!-- atat name de la telefon cat si email trebuie sa fie acelasi -->
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" required>

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto[contacto]" type="radio" value="email" id="contactar-email" required>
                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="contacto[fecha]" />
                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00" name="comtacto[hora]"/>

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>
