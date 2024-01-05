<?php

namespace Controllers;

use MVC\Router;
//accesam tot ce avem in vendor
use Model\Vendedor;

class VendedorController{

    public static function crear(Router $router){
//trimitem la pagina respectiva iar dupa in paranteza adaugam ce date vrem sa se vada in pagina

//salvam in error functia getErrors
$errores = Vendedor::getErrores();
$vendedor = new Vendedor;

//folosim server pentru a obtine mai detaliate cand folosi var_dump($_FILES, sau $_POST)
if($_SERVER["REQUEST_METHOD"]=== "POST"){

    //asa salvam in variabila vendedor ce primim la post ,dar in acelasi timp il salvam si in clasa vendedor
$vendedor = new Vendedor($_POST["vendedor"]);

//Facem o validare ca nu avem  spati goale
$errores=$vendedor->validar();

//daca nu avem errori salvam vendedoru

if (empty($errores)){
  
    $vendedor->guardar();
}
}
        $router->render("vendedores/crear",[

//iar aici o trimitem in la pagina
            'errores'=>$errores,
            'vendedor'=>$vendedor
        ]);

        
    }
    public static function actualizar(Router $router){
        $vendedor = new Vendedor;

$errores = Vendedor::getErrores();
if($_SERVER["REQUEST_METHOD"]=== "POST"){
$args = $_POST['vendedor'];
$vendedor ->sincronizar($args);
//Facem o validare ca nu avem  spati goale
$errores=$vendedor->validar();

//daca nu avem errori salvam vendedoru

if (empty($errores)){
  
    $vendedor->guardar();
}
}

        $router->render("vendedores/actualizar",[
            "errores"=>$errores,
            "vendedor"=>$vendedor
        ]);



    }
    public static function eliminar(){

        if($_SERVER["REQUEST_METHOD"]==="POST"){
        
         $id= $_POST["id"];
         $id= filter_var($id,FILTER_VALIDATE_INT);

         if($id){
            
        //validam tipu  care trebuie eliminat
        $tipo = $_POST['tipo'];
            if(validarTipoContenido($tipo)){

                $vendedor = Vendedor::find($id);
        
                $vendedor->eliminar();
        
        }
    }
    }
  
    }
}
?>