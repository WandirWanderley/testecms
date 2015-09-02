<?php
define("bd_host", 'localhost');  
define("bd_user", 'root');  
define("bd_pass", '');  
define("bd_name", 'cms'); 

class _cms {
	public function cms_conn() {
		mysql_connect(bd_host,bd_user,bd_pass) or die("Não conectou ao banco de dados. " . mysql_error());
		mysql_select_db(bd_name) or die("Nenhum banco de dados selecionado. " . mysql_error());
		}
		
	public function cms_insert($cms_page_title, $cms_page_content, $cms_page_link, $cms_page_create) {
		$sql = mysql_query("INSERT INTO paginas (titulo, conteudo, link, data) VALUES ('$cms_page_title', '$cms_page_content', '$cms_page_link', '$cms_page_create')");
		header("Location: ./admin.php");
		}
	public function cms_update($cms_page_id, $cms_page_title, $cms_page_content) {
		$sql = mysql_query("UPDATE paginas SET titulo='$cms_page_title', conteudo='$cms_page_content' WHERE id='$cms_page_id'");
		header("Location: ./admin.php");
	}
	public function cms_delete($cms_page_id) {
		$sql = mysql_query("DELETE FROM paginas WHERE id=$cms_page_id");
		header("Location: ./admin.php");
		}
	public function cms_login($cms_user_login, $cms_user_pass) {
		$cms_user_q = mysql_query("SELECT * FROM usuarios WHERE usuario ='" . $cms_user_login ."'");
		if(mysql_num_rows($cms_user_q) == 1) {
			$cms_user_d = mysql_fetch_array($cms_user_q);
			if($cms_user_d["senha"] == $cms_user_pass) {
				$_SESSION["cms_user_id"] = $cms_user_d["id"];
				header("Location: ./admin.php");
			} else {
				echo "<script>alert('Usuário ou senha errado(s)!');</script>";
			}
		} else {
			echo "<script>alert('Usuário ou senha errado(s)!');</script>";
		};
	}
	public function cms_logout() {
		session_destroy();
		header("Location: ./admin.php");
	}
	public function cms_contact($cms_contact_name, $cms_contact_email, $cms_contact_message) {
		mail("wandir@oi.com.br","Contato de $cms_contact_name",$cms_contact_message,"From: $cms_contact_email");
	}
}

	$cms_bd_conn = new _cms;
	$cms_bd_conn -> cms_conn();
?>