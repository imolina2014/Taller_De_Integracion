<?php
	include("./conex.php");

	function emailExiste($email) {
		global $mysqli;

		$stmt = $mysqli->prepare("SELECT ID_USUARIO FROM id2847271_imolina WHERE EMAIL = ? LIMIT 1");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;
		$stmt->close();

		if($num>0) {
			return true;
		}
		else {
			return false;
		}
	}

	function getValor($campo, $campoWhere, $valor) {
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT $campo FROM id2847271_imolina WHERE $campoWhere = ? LIMIT 1");
		$stmt->bind_param("s",$valor);
		$stmt->execute();
		$stmt->store_result();
		$num = $stmt->num_rows;

		if($num>0) {
			$stmt->bind_result($_campo);
			$stmt->fetch();
			return $_campo;
		}
		else {
			return false;
		}
	}
?>