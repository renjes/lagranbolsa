<?php
/**
 * Created by PhpStorm.
 * User: renjes
 * Date: 8/05/15
 * Time: 11:54 PM
 */
require_once '../includes/Db.class.php';
class Empresa {

    private $dbh;

    function __construct() {
        $this->dbh = new DB();
    }

    public function insert($strEmpresa, $strUsuario, $strPassword, $strConfPassword, $strEmail, $strContacto, $intTipoUsuario, $intEstado) {
        $response = array();
        $fechaIngreso = date('Y-m-d');
        $fechaBaja = date('Y-m-d', strtotime('+1 year'));
        if(!empty($strEmpresa) && !empty($strUsuario) && !empty($strPassword) && !empty($strConfPassword) && !empty($strEmail) && !empty($strContacto) && !empty($intTipoUsuario) && !empty($intEstado)) {
            $params = array(
                'strEmpresa' => $strEmpresa,
                'strUsuario' => $strUsuario,
                'strPassword' => $strPassword,
                'strConfPassword' => $strConfPassword,
                'strEmail' => $strEmail,
                'strContacto' => $strContacto,
                'bitActivo' => 1,
                'fechaIngreso' => $fechaIngreso,
                'fechaBaja' => $fechaBaja,
                'intTipoUsuario' => $intTipoUsuario,
                'intEstadio' => $intEstado
            );
            $sql = "CALL SPsetEmpresa (:strEmpresa, :strUsuario, :strPassword:, :strConfPassword,
            :strEmail, :strContacto, :bitActivo, :fechaIngreso, :fechaBaja, :intTipoUsuario, :intEstado)";
            $insert = $this->dbh->stored($sql, $params);
            return $insert;
        }
    }
	
	public function delete($idEmpresa) {
		$response = array();
		if(!empty($idEmpresa)) {
			$params = array(
				'idEmpresa' => $idEmpresa;
			);
			$sql = "CALL SPdelEmpresa (:idEmpresa)";
			$delete = $this->dbh->stored($sql, $param);
			return $delete;
		}
	}
	
	public function update($strEmpresa, $strUsuario, $strPassword, $strConfPassword, $strEmail, $strContacto, $intTipoUsuario, $intEstado, $idEmpresa) {
		$response = array();
		if(!empty($strEmpresa) && !empty($strUsuario) && !empty($strPassword) && !empty($strConfPassword) && !empty($strEmail) && !empty($strContacto) && !empty($intTipoUsuario) && !empty($intEstado) && !empty($idEmpresa)) {
			$params = array(
                'strEmpresa' => $strEmpresa,
                'strUsuario' => $strUsuario,
                'strPassword' => $strPassword,
                'strConfPassword' => $strConfPassword,
                'strEmail' => $strEmail,
                'strContacto' => $strContacto,
                'bitActivo' => 1,
                'fechaIngreso' => $fechaIngreso,
                'fechaBaja' => $fechaBaja,
                'intTipoUsuario' => $intTipoUsuario,
                'intEstadio' => $intEstado,
				'idEmpresa' => $idEmpresa
            );
			$sql = "CALL SPupdateEmpesa (:strEmpresa, :strUsuario, :strPassword:, :strConfPassword,
            :strEmail, :strContacto, :bitActivo, :fechaIngreso, :fechaBaja, :intTipoUsuario, :intEstado, :idEmpresa)";
			$update = $this->dbh->stored($sql, $params);
			return $update;
		} 
	}

}