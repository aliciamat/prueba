<?php
class ControladorBD{
private $servername="localhost";
private $username="root";
private $password="";
private $dbname="examen";



private $rs;
private $db;

static private $instancia=null;


private function __construct(){}

public static function getControlador(){
if(self::$instancia==null){
self::$instancia=new ControladorBD();
}
    return self::$instancia;
}


public function abrirBD(){
$this->bd=new PDO("mysql:host=$this->servername;dbname=$this->dbname",$this->username, $this->password);
$this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}


public function consultarBD($consulta){

if($this->rs=$this->bd->query($consulta)){
    return $this->rs;
}
else{
    echo "error en consulta";
}}


public function actualizarBD($consulta){
    if($this->bd->exec($consulta)!=0){
        return true;
    }
    else{
        return false;
    }
}


public function cerrarBD(){

$this->rs=null;
$this->bd=null;

}


}


?>



