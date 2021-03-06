<?php

class Sesiones extends Controller
{

    public function __construct()
    {
        $this->usuariomodelo = $this->model("Usuario");
        $this->clienteModelo = $this->model("Cliente");
        $this->SesionModelo = $this->model('Sesion');

    }
    public function index()
    {
        session_start();
        $sesiones = $this->SesionModelo->obtenerSesiones();
        $datos = [
            'titulo' => 'Listado de Sesiones de entrenamiento',
            'sesiones' => $sesiones,
        ];
        $this->vista('sesiones/index', $datos);
    }

    public function aprobar($id, $codigo_cliente)
    {
        session_start();

        if ($_SESSION['tipo_usuario'] == 1) {

            $cod = $this->clienteModelo->getValor("cod_usuario", "id", $codigo_cliente);

            $nombres = $this->clienteModelo->getValor("nombres", "id", $codigo_cliente);
            $apellidos = $this->clienteModelo->getValor("apellidos", "id", $codigo_cliente);
            $email = $this->usuariomodelo->getvalor("correo", "id", $cod->cod_usuario);
            $asunto = 'Su rutina ha sido aprobada - Confort gym';
            $cuerpo = "Estimado(a) $nombres->nombres $apellidos->apellidos:
                        <br><br>
                        Su rutina de entrenamiento ha sido aprobada con exito, <br>
                        ya puede dirigirse a nuestro gimnasio a realizar su rutina.
                        Recuerde que puede cancelar la rutina en cualquier momento, si su ingreso no es registrado en nuestro sistema, debera apartar otra rutina para el siguiente dia habil.
                        <b>
                        <br>
                        NOTA:<br>
                        Estimado cliente, este correo ha sido generado por un sistema de envio; por favor  NO responda al mismo ya que no podra ser gestionado.
                        ";

            $estado = "Aprobado";
            $asistencia=1;
            if ($this->SesionModelo->aprobarSesion($id, $estado,$asistencia)) {
                if (enviarEmail(trim($email->correo), $nombres->nombres, $asunto, $cuerpo)) {

                    redirecionar('sesiones');
                } else {
                    die('algo salio mal no se pudo notificar al usuario de la aprobacion');
                }
            } else {
                die('algo salio mal el email no pudo ser enviado');
            }

            $this->vista('sesiones/index' );
        } else {
            redirecionar('home');
        }

    }

    public function rechazar($id, $codigo_cliente)
    {
        session_start();

        if ($_SESSION['tipo_usuario'] == 1) {

            $cod = $this->clienteModelo->getValor("cod_usuario", "id", $codigo_cliente);
            $nombres = $this->clienteModelo->getValor("nombres", "id", $codigo_cliente);
            $apellidos = $this->clienteModelo->getValor("apellidos", "id", $codigo_cliente);
            $email = $this->usuariomodelo->getvalor("correo", "id", $cod->cod_usuario);
            $asunto = 'Su rutina ha sido aprobada - Confort gym';
            $cuerpo = "Estimado(a) $nombres->nombres $apellidos->apellidos:
                        <br><br>
                        Su rutina de entrenamiento ha sido Rechazada,<br>
                        nuestras instalaciones se encuentran al tope, por favor vuelva a intentarlo mas tarde.
                        .
                        <b>
                        <br>
                        NOTA:<br>
                        Estimado cliente, este correo ha sido generado por un sistema de envio; por favor  NO responda al mismo ya que no podra ser gestionado.
                        ";
            $estado = "Rechazado";
            $asistencia =0;
             if ($this->SesionModelo->aprobarSesion($id, $estado,$asistencia)) {
            if (enviarEmail(trim($email->correo), $nombres->nombres, $asunto, $cuerpo)) {
            
                    redirecionar('sesiones');
                } else {
                    die('algo salio mal no se pudo notificar al usuario de la aprobacion');
                }

            } else {
                die('algo salio mal el email no pudo ser enviado');
            }

            $this->vista('sesiones/index' );
        } else {
            redirecionar('home');
        }

    }

}
