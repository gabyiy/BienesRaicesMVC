<?php 
namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController{
public static function login (Router $router){


    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //aici creem o noua instanta cu ce avem in post
        $auth = new Admin($_POST);
        $errores = $auth->validar();



        if(empty($errores)){
            //verificam daca userul exista

       $resultado = $auth->existeUsuario();

       //daca resulado o sa fie null o sa primim o sa primim erroarea de la functia existeUSario
       if(!$resultado){
        $errores = Admin::getErrores();
       }else{
 //daca passwordul coincide

  $autenticado =  $auth->comprobarPassword($resultado);

  if ($autenticado){
            //autentificar useru

            $auth->autenticar();

  }else{
    //Password incorecto mensaje de error
    $errores = Admin::getErrores();

  }
       }

           
        }
    }

    $router->render("auth/login",[
"errores"=> $errores

    ]);

}
public static function logout(){
    session_start();
    $_SESSION=[];

    header("Location: /");
}
}
?>