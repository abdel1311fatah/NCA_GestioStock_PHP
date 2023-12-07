<?php

class ImagenModelo {

    public function guardarImagen($imagen) {
        $rutaDeGuardado = 'img/productes'; 

        // Genera un nombre único para la imagen
        $nombreUnico = 'image_' . time() . '.png';

        // Intenta guardar la imagen en el servidor
        $resultado = file_put_contents($rutaDeGuardado . $nombreUnico, $imagen);

        return $resultado !== false;
    }
}

?>