<?php
//<!-- aici creem functiile asoctiate la urleuri -->
namespace Controllers;
use MVC\Router;
use Model\Propriedad;
use Model\Vendedor;

class PropriedadController{

    public static function index(Router $router){
        //asa facem sa ne aduca functi all(care ne arata toate proprietatile) 
        //care este conectata la baza de date
        $propriedades =   Propriedad::all();
        $resultado = null;
        //si aici spunem la pagina sa faca render ,si datele carele o sa le trimitem la ruter de la views
        $router->render("propriedades/admin",[
            "propriedades"=>$propriedades,
            "resultado"=>$resultado
        ]);
      
    }
    public static function crear(Router $router){

        $propriedad = new Propriedad;
        $vendedores= Vendedor::all();

        if ($_SERVER["REQUEST_METHOD"]==="POST"){
        debug($_POST);
        }

        $router->render("propriedades/crear",[
            "propriedad"=>$propriedad,
            "vendedores"=>$vendedores
        ]);


    }public static function actualizar(){
        echo  "actualizar prorieda";

    }
}

?>