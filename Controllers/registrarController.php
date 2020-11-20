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

    #VERIFICAR TELEFONO VALIDO
    public function Telefono($numero){
        if (!empty($numero)) {
            if (Helpers::validarTelefono($numero)) {
                return ["success" => 0, "msj" => ""];
            } else {
                return ["success" => 1, "msj" => "<p class='text text-danger'>Telefono Invalido</p>"];
            }
        }
    }

    public function passwordIgual($passUno, $passDos){
        if(!empty($passUno) && !empty($passDos)){
            if(Helpers::passwordValido($passUno) && Helpers::passwordValido($passDos)){
                if($passUno == $passDos){
                    return ["success" => 0, "msj" => ""];
                }else{
                    return ["success" => 1, "msj" => "<p class='text text-danger'>Las contraseñas no coinciden</p>"];
                }
            }else{
                return ["success" => 1, "msj" => "<p class='text text-danger'>Las contraseñas no pueden llevar simbolos extraños</p>"];
            }
        }
    }

    #TELEFONO  
    #METODO INDEX 
    public function index()
    {
        // VERIFICAR QUE SE ENVIA INFORMACION EN EL FORMULARIO
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //TODOS LOS CAMPOS SON REQUERIDOS
            if (
                $this->getTexto("correo") && $this->getTexto('nombreUsuario') && $this->getTexto('nombre') &&
                $this->getTexto('apellido') && $this->getTexto('nacionalidad') && $this->getTexto('edad') &&
                $this->getTexto('idioma') &&  $this->getTexto('telefono') &&  $this->getTexto('pass')
            ) {
                /*
                    VALIDACIONES
                    ->Limpiamos los datos enviados con POST para que no lleven caracteres especiales strClean()
                    ->Correo y NombreUsuario no deben coincidir en la Base de datos Repetido()
                    ->Campos que permitan solo caracteres cadena()
                    ->Campos que permitan solo numeros numeros()
                    ->Campo que permita numero de telefono valido de nicaragua Telefono()
                    ->Campo con contraseñas iguales passwordIgual()
                */
                $datos = array(
                    "correo" => $this->Repetido($this->getTexto("correo"), "getCorreo", "Correo", "correoValido"),
                    "usuario" => $this->Repetido(Helpers::strClean($this->getTexto('nombreUsuario')), "getNomUsuario", "Usuario", "nombresValidos"),
                    "nombre" => $this->cadena(Helpers::strClean($this->getTexto('nombre')), "nombre"),
                    "apellido" => $this->cadena(Helpers::strClean($this->getTexto('apellido')), "apellido"),
                    "nacionalidad" => $this->cadena(Helpers::strClean($this->getTexto('nacionalidad')), "nacionalidad"),
                    "edad" => $this->numeros(Helpers::strClean($this->getTexto('edad')), "edad"),
                    "idioma" => $this->cadena(Helpers::strClean($this->getTexto('idioma')), "idioma"),
                    "telefono" => $this->Telefono($this->getTexto('telefono')),
                    "password" => $this->passwordIgual($this->getTexto('pass'),$this->getTexto('confirPass'))
                );

                //validaciones completas
                if (
                    !$datos['correo']['success'] && !$datos['usuario']['success'] && !$datos['nombre']['success'] &&
                    !$datos['apellido']['success'] && !$datos['nacionalidad']['success'] && !$datos['edad']['success'] &&
                    !$datos['idioma']['success'] && !$datos['telefono']['success'] && !$datos['password']['success']
                ) {
                    //CODIGO PARA ALMACENAR EL TURISTA
                    $this->modeloReg->insertTurista(array(
                        "correo" => $this->getTexto("correo"), "nombreUsuario" => $this->getTexto('nombreUsuario'),
                        "nombre" => $this->getTexto('nombre'), "apellido" =>$this->getTexto('apellido'),
                        "nacionalidad" =>$this->getTexto('nacionalidad'), "edad" => $this->getTexto('edad'),
                        "idioma" => $this->getTexto('idioma'), "telefono" => $this->getTexto('telefono'),
                        "pass" => password_hash($this->getTexto('pass'),PASSWORD_DEFAULT,['cost' => 10]), "token" => Helpers::token()
                    ));
                    
                    $this->redireccionar("index");
                } else {
                    $this->_view->correoError = $datos['correo']['msj'];
                    $this->_view->usuarioError = $datos['usuario']['msj'];
                    $this->_view->nombreError = $datos['nombre']['msj'];
                    $this->_view->apellidoError = $datos['apellido']['msj'];
                    $this->_view->nacionalidadError = $datos['nacionalidad']['msj'];
                    $this->_view->edadError = $datos['edad']['msj'];
                    $this->_view->idiomaError = $datos['idioma']['msj'];
                    $this->_view->telefonoError = $datos['telefono']['msj'];
                    $this->_view->passwordError = $datos['password']['msj'];
                }
            } else  $this->_view->formRequerido = "<p class='alert alert-danger font-weight-bold mt-2'>Campos Requeridos</p>";
        }

            $this->_view->telefono = Helpers::passwordValido("123a");

        // EN CASO DE QUE NO SE HA ENVIADO INFORMACION REDIRIGIMOS A LA VISTA
        $this->_view->getView("index", $this->datos);
    }
}
