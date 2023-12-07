<?php

class ImagenController {

    public function capturarImagen() {
        // Verifica si se han enviado datos POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtiene los datos de la imagen desde la solicitud POST
            $imagenBase64 = $_POST['data'];

            // Aquí podrías validar y procesar la imagen, por ejemplo:
            $imagenDecodificada = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenBase64));

            // Llama al modelo para guardar la imagen
            $modelo = new ImagenModelo();
            $resultado = $modelo->guardarImagen($imagenDecodificada);

            if ($resultado) {
                // Imagen guardada exitosamente
                $response = ['status' => 'success', 'message' => 'Imagen guardada correctamente'];
                echo json_encode($response);
            } else {
                // Manejo de error si no se pudo guardar la imagen
                $response = ['status' => 'error', 'message' => 'Error al guardar la imagen'];
                echo json_encode($response);
            }
        } else {
            // Manejo de error si no se recibe una solicitud POST
            $response = ['status' => 'error', 'message' => 'Método de solicitud no permitido'];
            echo json_encode($response);
        }
    }
}

?>
