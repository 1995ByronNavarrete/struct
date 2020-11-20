<?php
class registrarController extends Controller
{
    private $datos = array("header" => "headerP", "footer" => "footerP");
    private $modeloReg;

    public function __construct()
    {
        parent::__construct();
        $this->modeloReg = $this->loadModel("registrar");
    }

    #VERIFICAR NOMBRES, APELLIDOS O CADENAS DE CARACTERES VALIDAS
    public function cadena($cadena, $nombre)
    {
        if (!empty($cadena)) {
            if (Helpers::nombresValidos($cadena)) {
                return ["success" => 0, "msj" => ""];
            } else return ["success" => 1, "msj" => "<p class='text text-danger'>" . $nombre . " Invalido</p>"];
        }
    }

    #VERIFICAR ENTRADAS DE SOLO DIGITOS
    public function numeros($num, $nom)
    {
        if (!empty($num)) {
            if (Helpers::edadValida($num)) {
                return ["success" => 0, "msj" => ""];
            } else return ["success" => 1, "msj" => "<p class='text text-danger'>" . $nom . " Invalida</p>"];
        }
    }

    #VERIFICAR DATOS REPETIDOS
    public function Repetido($texto, $metodo, $nombre, $validacion)
    {
        if (!empty($texto)) {
            if (Helpers::$validacion($texto)) {
                $textoRepetido = $this->modeloReg->$metodo($texto);
                if ($textoRepetido->existe > 0) {
                    return ["success" => 1, "msj" => "<p class='text text-danger'>El " . $nombre . " ya existe</p>"];
                } else {
                    return ["success" => 0, "msj" => ""];
                }
            } else {
                return ["success" => 1, "msj" => "<p class='text text-danger'>" . $nombre . " Invalido</p>"];
            }
        }
    }

    #METODO INDEX 
    public function index()
    {
        // VERIFICAR QUE SE ENVIA INFORMACION EN EL FORMULARIO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //TODOS LOS CAMPOS SON REQUERIDOS
            if (
                $this->getTexto("correo") && $this->getTexto('nombreUsuario') && $this->getTexto('nombre') &&
                $this->getTexto('apellido') && $this->getTexto('nacionalidad') && $this->getTexto('edad') &&
                $this->getTexto('idioma')
            ) {
                /*
                    VALIDACIONES
                    ->Limpiamos los datos enviados con POST para que no lleven caracteres especiales strClean()
                    ->Correo y NombreUsuario no deben coincidir en la Base de datos Repetido()
                    ->Campos que permitan solo caracteres cadena()
                    ->Campos que permitan solo numeros numeros()
                */
                $datos = array(
                    "correo" => $this->Repetido($this->getTexto("correo"), "getCorreo", "Correo", "correoValido"),
                    "usuario" => $this->Repetido(Helpers::strClean($this->getTexto('nombreUsuario')), "getNomUsuario", "Usuario", "nombresValidos"),
                    "nombre" => $this->cadena(Helpers::strClean($this->getTexto('nombre')), "nombre"),
                    "apellido" => $this->cadena(Helpers::strClean($this->getTexto('apellido')), "apellido"),
                    "nacionalidad" => $this->cadena(Helpers::strClean($this->getTexto('nacionalidad')), "nacionalidad"),
                    "edad" => $this->numeros(Helpers::strClean($this->getTexto('edad')), "edad"),
                    "idioma" => $this->cadena(Helpers::strClean($this->getTexto('idioma')), "idioma")
                );

                if (
                    !$datos['correo']['success'] && !$datos['usuario']['success'] && !$datos['nombre']['success'] &&
                    !$datos['apellido']['success'] && !$datos['nacionalidad']['success'] && !$datos['edad']['success'] &&
                    !$datos['idioma']['success']
                ) {
                    //CODIGO PARA ALMACENAR EL TURISTA
                } else {
                    $this->_view->correoError = $datos['correo']['msj'];
                    $this->_view->usuarioError = $datos['usuario']['msj'];
                    $this->_view->nombreError = $datos['nombre']['msj'];
                    $this->_view->apellidoError = $datos['apellido']['msj'];
                    $this->_view->nacionalidadError = $datos['nacionalidad']['msj'];
                    $this->_view->edadError = $datos['edad']['msj'];
                    $this->_view->idiomaError = $datos['idioma']['msj'];
                }
            } else  $this->_view->formRequerido = "<p class='alert alert-danger font-weight-bold mt-2'>Campos Requeridos</p>";
        }

        // EN CASO DE QUE NO SE HA ENVIADO INFORMACION REDIRIGIMOS A LA VISTA
        $this->_view->getView("index", $this->datos);
    }
}
