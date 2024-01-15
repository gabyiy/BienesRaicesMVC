<?php 
//Controlleru asta o sa il folosim pentru a genera content in paginiile pe care le pot vizita useri
namespace Controllers;

use Model\Propriedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\Test\PHPMailer\SetFromTest;

class PaginasController{

    public static function index(Router $router){
        $propriedades = Propriedad::get(3);
        //folosim inicio pentru a ne arata imaginea din header(la celelalte pagini nu o avem)
        $inicio=true;


        $router->render("paginas/index",[
            "propriedades"=>$propriedades,
            "inicio"=>$inicio
        ]);
    }
    public static function nosotros(Router $router){
        $router->render("paginas/nosotros",[

        ]);
    }
    public static function prorpiedades(Router $router){
        $propriedades = Propriedad::all();
        $router->render("paginas/propriedades",[
            "propriedades"=>$propriedades

        ]);
    }
    public static function propriedad(Router $router){
        //in caz ca nu ii trimitem un id valid folosim functia ca sa ne redirectioneze la propriedades
        $id = validarOredirectionar("/paginas/propriedades");

        //iar asa cautam proprietatea dupa id 

        $propriedad=Propriedad::find($id);
        $router->render("paginas/propriedad",[
            "propriedad"=>$propriedad
        ]);
    }
    public static function blog(Router $router){

        $router->render("paginas/blog",[
        
        ]);
    }
    public static function entrada(Router $router){
        $router->render("/paginas/entrada");
    }
    public static function contacto(Router $router){

        if($_SERVER["REQUEST_METHOD"]==="POST"){

            //aici salvam toate datele care le primim de la formular
            $respuestas = $_POST["contacto"];

            //creem o instanta de php mailer pentru a utiliza functiiile din php mailer
            $mail = new PHPMailer();
            
            //configurarea Protocolului SMPT
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth=true;
            $mail->Username="1b9ecbc2b54a9a";
            $mail->Password="a60a1c2074471e";
            $mail->SMTPSecure="tls";
            $mail->Port=2525;

            //configurar el contenido del email
            $mail->setFrom("admin@bienesraices.com");
            $mail->addAddress("admin@bienesraices.com", "Bienes raices");
            $mail->Subject= "Tienes un nuevo mensaje";

            //habilitam html
            $mail->isHTML(true);
            $mail->CharSet="UTF-8";

            //definim contenitu
            //cu .= facem o concatenare
            $contenido = "<html>";
           $contenido .=" <p>Tienes un nuevo mensaje </p>";
           $contenido.= "<p>Nombre: " . $respuestas["nombre"] . "</p>";
           $contenido.= "<p>Email: " . $respuestas["email"] . "</p>";
           $contenido.= "<p>Telefono: " . $respuestas["telefono"] . "</p>";
           $contenido.= "<p>Mensaje: " . $respuestas["mensaje"] . "</p>";
           $contenido.= "<p>Tipo: " . $respuestas["tipo"] . "</p>";
           $contenido.= "<p>Precio: " . "$" .$respuestas["precio"] . "</p>";
           $contenido.= "<p>Prefiere ser contacto por: " . $respuestas["contacto"] . "</p>";
           $contenido.= "<p>Fecha contacto: " . $respuestas["fecha"] . "</p>";
           $contenido.= "<p>Hora contacto: " . $respuestas["hora"] . "</p>";




           $contenido .= " </html>";

            $mail->Body=$contenido;
            //Trimitem emailu
            //send ne da un true sau false ,asa putem utiliza un if
        if( $mail->send())
            {
                echo "Mensaje enviado corectamete";
        }else{
            echo "El mensaje no se pudo enviar";
        };
        }
$router->render("paginas/contacto",[

]);
    }

}
?>