<?php

namespace Model;


class Admin extends ActiveRecord{

    //baza de date

    protected static $tabla = "usuarios";
    protected static $columnasDB =["id","email","password"];

    public $id;
    public $email;
    public $password;

    public function __construct($args= [])
    {
$this->id= $args["id"]??null;
$this->email= $args["email"]??'';
$this->password= $args["password"]??'';


    }

    //o sa folsoim functia asta pentru a valida daca useru a introdus un email sau password
    public function validar(){

        //asa adaugam la arroyu errores la care avem acces din active record
        if(!$this->email){
            self::$errores[]= "introdu un mail";
        }
        if(!$this->password){
            self::$errores[]= "introdu o parola";
        }
        return self::$errores;
    }

    public function existeUsuario (){
        //aici avem acces deja la emai si password pe care il avem salvat in $auth
        //facem queryiu pentru a vedea daca mailu exista in baza de date cu cel introdus de user
        $query = "SELECT * FROM " . self::$tabla . " WHERE email =  '" . $this->email . "' LIMIT 1";

        //si acum facem searchu in db
        $resultado =self::$db->query($query);

        if(!$resultado -> num_rows){
            self::$errores[]="El usuario no existe";
            return;
        }else{
            return $resultado;
        }

    }
    public function comprobarPassword($resultado){
        //asa salvam in user tot ce avem in resultat atat emailu cat si passu
        $usuario = $resultado->fetch_object();

        //iar aici scoatem passowrdu itrodus de user si passwordu care vine haseat (
            // si cu password verify verificam daca cele doua coincid

            $autetificado = password_verify($this->password ,$usuario->password);
            if(!$autetificado){
                self::$errores[]="El password es incorecto";
            }
        return $autetificado;
    }

    public function autenticar (){
//initiem sesiunea 
session_start();
//Iar aici salvam userul in sesiune
$_SESSION["usuario"]=$this->email;
$_SESSION["login"]=true;

header("Location: /admin");

    }
}
?>