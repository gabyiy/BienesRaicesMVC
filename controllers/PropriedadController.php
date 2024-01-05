<?php
//<!-- aici creem functiile asoctiate la urleuri -->
namespace Controllers;
use MVC\Router;
use Model\Propriedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;



class PropriedadController{

    public static function index(Router $router){
        //asa facem sa ne aduca functi all(care ne arata toate proprietatile) 
        //care este conectata la baza de date
        $propriedades =   Propriedad::all();
        $vendedores = Vendedor::all();

        //si asa scoate mesajul pe care il primim din crear.php , iar daca nu exista sa fie null
$resultado = $_GET["resultado"]?? null;


        //si aici spunem la pagina sa faca render ,si datele carele o sa le trimitem la ruter de la views
        $router->render("propriedades/admin",[
            "propriedades"=>$propriedades,
            "vendedores"=>$vendedores,
            "resultado"=>$resultado
        ]);

      
    }
    public static function crear(Router $router){

        $propriedad = new Propriedad;
        $vendedores= Vendedor::all();

        //aici accesam clasa proprieda pentru a avea acces la errores, nu e nevoie sa instantiem cu new fiind protected
$errores = Propriedad::getErrores();



        if ($_SERVER["REQUEST_METHOD"]==="POST"){


          //instantiem clasa propriedad pentru a avea acces la functiile ei
    //si in acelasi timp le trecem si parametru post cu ce primim din arrayul propriedad din formular
    $propriedad = new Propriedad($_POST['propriedad']);


    //creem un folder pentru imagini
    
    
    //aici generam un nume unic pentru a il da imagini
    
    $nombreImagen =md5(uniqid(rand(),true)) . ".jpg";
    
    
    
    //Urcam imaginea si ii face un resize cu intervention  
    //imaginea o aducem cum superglobala $_files  iar ca primu parametru punem de unde o luam adica unde are numele image
    //iar al doilea parametru este numele temporal
    //iar dupa utilizam functia predefinita fit care face ca imaginea sa nu depasesca o anumita capacitate de ex 500 kb
    //si ca parametru spunem ca vrea sa aibee 800 px inaltime cu 600 latime
    if ($_FILES['propriedad']['tmp_name']['imagen']){
    $image =  Image::make($_FILES['propriedad']['tmp_name']['imagen'])->fit(800,600);
    //iar aici folosim functia creata in propriedades pentru a trimite imaginea ca parametru care este nombreimagen
    $propriedad->setImagen($nombreImagen);
    
    }
    
    //aici utilizam metoda  validar
    $errores= $propriedad->validar();
    
    //revizam ca nu avem nici o erroare
    
    if(empty($errores)){
        //daca nu avem erroare urcam imaginea la servidor
        
        //acesam functia guardar care o sa ne adauge proprietatea de forma automata
        
    
    // si aici aspunem ca daca ne este creat folderul din funciones ca sa il creeze
    if (!is_dir(CARPETA_IMAGENES)){
        mkdir(CARPETA_IMAGENES);
    }
    
    //Salvam destinatia unei imagini intro variabila
    
    //Salvam imaginea in server
    $image->save(CARPETA_IMAGENES . $nombreImagen);
    
    //folosim exit cand vrem sa oprim fluxu de informati in php(sa verificam datele introdude de ex cu var_dump)
    // exit;
    
    //Salvam imaginea in baza de date
    $resultado=$propriedad->guardar();
}
    
    }

        $router->render("propriedades/crear",[
            "propriedad"=>$propriedad,
            "vendedores"=>$vendedores,
            "errores"=>$errores
        ]);


    }public static function actualizar(Router $router){

        //asa scoate id din functie care se afla in includes temlates
       $id=validarOredirectionar("/admin");

        $propriedad =  Propriedad::find($id);
        $vendedores = Vendedor::all();
        $errores = Propriedad::getErrores();

        //Pentru a actualiza datele

        //folosim server pentru a obtine mai detaliate cand folosi var_dump($_FILES, sau $_POST)
if($_SERVER["REQUEST_METHOD"]=== "POST"){

    //Asignam  ce avem in arrayul propriedad din formular_propriedades
    $args =$_POST["propriedad"];


    $propriedad->sincronizar($args);

    //revizam ca nu avem nici o erroare

    $errores = $propriedad->validar();

//validam upload arhive

$nombreImagen =md5(uniqid(rand(),true)) . ".jpg";


if ($_FILES['propriedad']['tmp_name']['imagen']){
    $image =  Image::make($_FILES['propriedad']['tmp_name']['imagen'])->fit(800,600);
    //iar aici folosim functia creata in propriedades pentru a trimite imaginea ca parametru care este nombreimagen
    $propriedad->setImagen($nombreImagen);
    
    }

if(empty($errores)){
    //salvam imaginea
    if ($_FILES['propriedad']['tmp_name']['imagen']){

        $image ->save(CARPETA_IMAGENES . $nombreImagen);
    }
//folosim exit cand vrem sa oprim fluxu de informati in php(sa verificam datele introdude de ex cu var_dump)
$propriedad->guardar();
 

}
}
        $router->render("propriedades/actualizar",[


            "propriedad"=>$propriedad,
            "errores"=>$errores,

            "vendedores"=>$vendedores,


        ]);
    }
    public static function eliminar ( ){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $id= $_POST["id"];
            //iar aici il transformam in int
            $id=filter_var($id,FILTER_VALIDATE_INT);
        
            //aici facem diferenta de ce primim la post (fie name propriedad sau vendedor ),asa putem sterge
            //ori proprietatea ori vanzatoru
        
        
            $tipo = $_POST['tipo'];
        
            if(validarTipoContenido($tipo)){
        
                $proprieda = Propriedad::find($id);
        
                $proprieda->eliminar();
        
        }
    }
    }
}

?>