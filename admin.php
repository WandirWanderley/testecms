<?php
require_once("config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administração do Website</title>
<style type="text/css">
*, body {
	font: normal 1.000em Arial, Helvetica, sans-serif;
	margin: 0;
	padding: 0;
	line-height: 1.125em;
	vertical-align: text-bottom;
}
form {
	margin: 5% auto;
	padding: 1.000em;
	width: 50%;
	background: #FAFAFA;
	border-radius: 1.000em
}
input[type=text], input[type=password], textarea {
	width: 100%;
	display: inline-block;
	padding: 0.125em;
	resize: none;
	border: solid 0.063em #B0B0B0;
	border-radius: 0.250em
}
input[type=text]:focus, input[type=password]:focus, textarea:focus {
	outline: none;
	border-color: #000000
}
button, a.btn {
	border-radius: 0.500em;
	background: #000000;
	color: #FFFFFF;
	cursor: pointer;
	padding: 0.500em;
	border: solid 1px #134111;
	margin: 0.125em;
	display: inline-block;
	text-decoration: none;
}
table {
	margin: 0 auto;
	border-collapse: collapse;
}
</style>
</head>

<body>
<form method="post">
<?php
session_start();
switch(@$_POST["btn_submit"]) {
	case "ipt_user_submit":
		$cms_login = new _cms;
		$cms_login -> cms_login($_POST["login"],$_POST['senha']);
	break;
	case "ipt_user_logout":
		$cms_logout = new _cms;
		$cms_logout -> cms_logout();
	break;
	case "ipt_page_insert":
		$data = date("Y-m-d");
		$link = ereg_replace("[^a-zA-Z0-9_]", "", strtr($_POST["titulo"], "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
		$cms_insert = new _cms;
		$cms_insert -> cms_insert($_POST["titulo"],$_POST["conteudo"],$link,$data);
	break;
	case "ipt_page_update":
		$cms_update = new _cms;
		$cms_update -> cms_update($_POST["id"],$_POST["titulo"],$_POST["conteudo"]);
	break;
}
if(!isset($_SESSION["cms_user_id"])) {
?>
  <label>Usuário:
    <input type="text" name="login" placeholder="Nome do usuário.">
  </label>
  <label>Senha:
    <input type="password" name="senha" placeholder="Senha do usuário.">
  </label>
  <button type="submit" value="ipt_user_submit" name="btn_submit">Entrar</button>
<?php
} else {
	if(@!$_GET["order"]) {
?>
  <button type="submit" name="btn_submit" value="ipt_user_logout">Sair</button>
  <a href="?order=cms_new_page" class="btn">Nova Página</a>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <th scope="col" width="60%">Título da Página</th>
      <th scope="col" width="20%">Data da criação</th>
      <th scope="col" width="20%">Comandos</th>
    </tr>
    <?php
	$cms_pages_i = mysql_query("SELECT * FROM paginas");
		while($cms_pages_l = mysql_fetch_array($cms_pages_i)) {	
?>
    <tr>
      <td style="vertical-align:middle"><?php echo $cms_pages_l["titulo"] ?></td>
      <td align="center" style="vertical-align:middle"><?php echo date("d/m/Y", strtotime($cms_pages_l["data"])) ?></td>
      <td><a href="?order=cms_edit_page&id=<?php echo $cms_pages_l["id"] ?>" class="btn">Editar</a> <a href="?order=cms_delete_page&id=<?php echo $cms_pages_l["id"] ?>" class="btn">Excluir</a></td>
    </tr>
    <?php
		}
?>
  </table>
<?php		
	} else {
		switch($_GET["order"]) {
			case "cms_new_page":
?>
  <label>Título:
    <input type="text" name="titulo" placeholder="Título da página.">
  </label>
  <label>Conteúdo:
    <textarea name="conteudo" placeholder="Conteúdo da página."></textarea>
  </label>
  <button type="submit" name="btn_submit" value="ipt_user_logout">Sair</button>
  <button type="submit" name="btn_submit" value="ipt_page_insert">Cadastrar</button>
  <a href="./admin.php" class="btn">Cancelar</a>
<?php
			break;
			case "cms_edit_page":
				$cms_pages_i = mysql_query("SELECT * FROM paginas WHERE id='" . $_GET["id"] . "'");
					while($cms_pages_l = mysql_fetch_array($cms_pages_i)) {	
?>
  <label>Título:
    <input type="text" value="<?php echo $cms_pages_l["titulo"] ?>" name="titulo" placeholder="Título da página.">
    <input type="hidden" value="<?php echo $cms_pages_l["id"] ?>" name="id">
  </label>
  <label>Conteúdo:
    <textarea  name="conteudo" placeholder="Conteúdo da página." rows="10"><?php echo $cms_pages_l["conteudo"] ?></textarea>
  </label>
  <button type="submit" name="btn_submit" value="ipt_user_logout">Sair</button>
  <button type="submit" name="btn_submit" value="ipt_page_update">Atualizar</button>
  <a href="./admin.php" class="btn">Cancelar</a>
<?php
					}
			break;
			case "cms_delete_page":
				$cms_delete = new _cms;
				$cms_delete -> cms_delete($_GET["id"]);
			break;
		}
	}
}
?>
</form>
</body>
</html>