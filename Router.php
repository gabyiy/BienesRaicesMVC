<?php 

namespace MVC;
class Router {

    public $rutasGET=[];
    public $rutasPOST=[];

    public function get ($url,$fn){
        $this->rutasGET[$url]=$fn;
    }


    public function post ($url,$fn){
        $this->rutasPOST[$url]=$fn;
    }

    public function comprobarRutas() {

        session_start();
$auth = $_SESSION["login"]?? null;

        //Array de rute protejate
        $rutas_protegidas= ["/admin", "/propriedades/crear", "/propriedades/actualizar", '/propriedades/eliminar',"/vendedores/crear","/vendedores/actualizar","/vendedores/eliminar"];

        //pentru a verifica pathu url ,daca nu este cel dorit sa ne trimita la main
        $urlActual=$_SERVER["PATH_INFO"]??"/";
        $metodo= $_SERVER["REQUEST_METHOD"];

        
        if ($metodo==="GET"){
            //asa scoatem rutele dinamice si ne arata doar ruta din url pagini
           $fn= $this->rutasGET[$urlActual]?? null;
        }else{
            $fn= $this->rutasPOST[$urlActual]?? null;
        }
        //Protejam rutele
        if(in_array($urlActual,$rutas_protegidas) && !$auth){
            header("Location: /");
        }

        //daca avem o ruta care are adresa din url
        if($fn){
            //asa specificam sa chem acea functie ,chiar daca nu stim cum se numeste
        call_user_func($fn,$this);
        }else{
            echo "Pagina no registrada";
        }
    }
  
    //facem sa ne arate ce avem in views ,dar de forma dinamica, si va primi si unele date de tip array

    public function render($view, $datos=[]){
        //cu ob_start specifivificam ca vrem sa salvam in memorie 
        foreach($datos as $key =>$value){
            //asa specifcam ca si key sa ia proprietatea valor
            //daca key este gabi si value e mihai ,keyu o sa fie mihai
            
            $$key = $value;
        }
        ob_start();
        include __DIR__  . "/views/$view.php";
        //aici curatm memorie si o salvam in contenido  pentru a adauga de forma dinamica ce dorim 
        //in pagina
        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";  
    }
}
?>