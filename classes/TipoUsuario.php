<?php
/**
 * Created by PhpStorm.
 * User: renjes
 * Date: 6/05/15
 * Time: 12:23 AM
 */
require_once '../includes/Db.class.php';
class TipoUsuario {

    private $dbh;

    function __construct() {
        $this->dbh = new DB();
    }

    public function insert($strTipoUsuario) {
        $response = array();
        if(!empty($strTipoUsuario)) {
            $params = array(
                'strTipoUsuario' => $strTipoUsuario
            );
            $sql = "INSERT INTO cat_tipo_usuarios (str_tipo_usuario) VALUES (:strTipoUsuario)";
            $insert = $this->dbh->query($sql, $params);
            return $insert;
        }else {
            $response['mensaje'] = "Error al intentar dar de alta un tipo de usuario";
            return $response;
        }
    }

    public function delete($id) {
        $response = array();
        if(!empty($id)) {
            $params = array(
                'id' => $id
            );
            $sql = "DELETE FROM cat_tipo_usuarios  WHERE int_tipo_usuario = :id";
            $delete = $this->dbh->query($sql, $params);
            return $delete;
        }else {
            $response['mensaje'] = "Error al intentar eliminar el registro";
        }
    }
}