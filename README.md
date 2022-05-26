# enviar-datos-con-ajax-a-php
Enviar Datos con Ajax a PHP


    <body>
        <div style="display: inline-grid;">
            <button id="enviar">Enviar respuesta por Ajax</button>
            <input type="text" id="mensaje" placeholder="Escribe el mensaje">
            <textarea name="respuesta" id="respuesta" cols="30" rows="5"
                >Aquí recibirás la Respuesta por Ajax
            </textarea> 
        </div>

    </body>
    <script> 
        // Evento que activa la conexion a Ajax
        document.getElementById('enviar').addEventListener('click', 
            function(e) {
                // Creamos un ForData para guardar los datos
                var datos = new FormData();
                // Leemos el input que contiene el mensaje
                var mensaje = document.getElementById('mensaje').value;
                // Identificamos donde vamos a mostrar e mensaje devuelta
                var recibe_mensaje = document.getElementById('respuesta');
                // Agregamos el Mensaje al ForData para enviarlo
                datos.append('mensaje', mensaje); 
                // Creamos el llamado a Ajax
                var xhr = new XMLHttpRequest(); 
                // Abrimos la conexion apuntando al archivo 
                xhr.open('POST', 'retorno.php', true);
                // Retorno de datos desde el archivo
                xhr.onload = function() {
                    if (this.status === 200) {
                        //  xhr.responseText retorna en Formato JSON los datos
                        //  JSON.parse se usa para convertir a objeto el JSON 
                        var respuesta = JSON.parse(xhr.responseText); 
                        // Tomamos el mensaje y lo agregamos a recibe_mensaje
                        recibe_mensaje.innerHTML = respuesta.mensaje;                        
                    } else {
                        // En caso de falla devuelve un mensaje 
                        recibe_mensaje.innerHTML = 'No hay respuesta'; 
                    }
                } 
                // Enviar la peticion con los datos
                xhr.send(datos);
        }); 
    </script>
    


     // NOTA: Esto va en el archivo llamado retorno.php 
     <?php
     
        // Inicio valida que exista método $_POST 
        // y el motodo get $_GET este vacío
        if(!empty($_POST) && empty($_GET)){

            // Rebotamos de vuelta la información recibida 
            // para verificar el correcto funcionamiento
            die (json_encode($_POST));

        }else{

            // Método invalido, sólo admite POST
            die (json_encode('Método Inválido'));

        }

  ?>
