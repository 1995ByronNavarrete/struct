<?php
class Helpers
{
    //Eliminar caracteres especiales
    public static function strClean($strCadena)
    {
        $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final de la cadena
        $string = stripcslashes($string); //Elimina las \ invertidas
        $string = str_ireplace("<script", "", $string);
        $string = str_ireplace("</script>", "", $string);
        $string = str_ireplace("<script src", "", $string);
        $string = str_ireplace("<script type=>", "", $string);
        $string = str_ireplace("SELECT * FROM ", "", $string);
        $string = str_ireplace("DELETE FROM ", "", $string);
        $string = str_ireplace("INSERT INTO ", "", $string);
        $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
        $string = str_ireplace("DROP TABLE", "", $string);
        $string = str_ireplace("OR '1'='1'", "", $string);
        $string = str_ireplace('OR "1"="1"', "", $string);
        $string = str_ireplace('OR `1`=`1`', "", $string);/* */
        $string = str_ireplace("is NULL; --", "", $string);
        $string = str_ireplace("is NULL; --", "", $string);
        $string = str_ireplace("LIKE '", "", $string);
        $string = str_ireplace('LIKE "', "", $string);
        $string = str_ireplace("LIKE `", "", $string);/* */
        $string = str_ireplace("OR 'a'='a", "", $string);
        $string = str_ireplace('OR "a"="a', "", $string);
        $string = str_ireplace("OR `a`=`a", "", $string);/* */
        $string = str_ireplace("OR `a`=`a", "", $string);/* */
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("^", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);
        $string = str_ireplace("==", "", $string);
        $string = str_ireplace("/", "", $string);
        return $string;
    }

    //Cadena de texto solo caracteres
    public static function nombresValidos($cadena){
        if(preg_match('/^[A-Za-zÑñáéíóúÁÉÍÓÚ\s]+$/i',$cadena)){
            return $cadena;
        }
        return false;
    }

    //Edad Valida
    public static function edadValida($edad){
        if(preg_match('/^[0-9]+$/',$edad)){
            return $edad;
        }
        return false;
    }

    //Correo valido
    public static function correoValido($correo){
        if(preg_match('/^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})+$/i',$correo)){
            return $correo;
        }
        return false;
    }

    public static function validarTelefono($numero){
        $reg = "";
        if(preg_match('/^(\+505|505)?[-]*[0-9]{4}[-]*[0-9]{4}$/', $numero)) return $numero;
        else return false;
    }

    public static function passwordValido($pass){
        if(preg_match("/^[A-Za-z0-9]+$/",$pass)){
            return $pass;
        }else return false;
    } 

    // Generar una contraseña de 10 caracteres
    public static function passwordGenerator($length = 10)
    {
        $pass = "";
        $character = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $longCharacter = strlen($character);

        for ($i = 0; $i <= $length; $i++) {
            $pos = rand(0, $longCharacter - 1);
            $pass .= substr($character, $pos, 1);
        }

        return $pass;
    }

    // Encriptar Password
    public static function encriptarPassword($password){
        $password = password_hash($password,PASSWORD_DEFAULT,['cost' => 10]);
        return $password;
    }

    // Verificar Password
    public static function verificarPassword($inputPass,$hash){
        if(password_verify($inputPass,$hash)){
            return true;
        }

        return false;
    }

    //genera token
    public static function token()
    {
        $r1 = bin2hex(random_bytes(5));
        $r2 = bin2hex(random_bytes(5));
        $r3 = bin2hex(random_bytes(5));
        $r4 = bin2hex(random_bytes(5));

        $token = $r1 . '-' . $r2 . '-' . $r3 . '-' . $r4;
        return $token;
    }
}
