<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
class Sesion{
  function __construct() {
    session_start();
  }

  public function set ($nombre, $valor) {
    $_SESSION[$nombre]=$valor;
  }

  public function get ($nombre){
    if (isset ($_SESSION [$nombre])) {
      return $_SESSION [$nombre];
    }else {
      return false;
    }
  }

  public function borrar_variable ($nombre) {
    unset ($_SESSION [$nombre]);
  }

  public function borrar_sesion() {
    $_SESSION= array();
    session_destroy();
  }
}
?>
