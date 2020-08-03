<?

require_once "configs/init.php";
require_once "controllers/header.php";

if($_GET[qpage] && is_file("controllers/$_GET[qpage].php")) require_once "controllers/$_GET[qpage].php";

if(!$_GET[noview] && !$_GET[loginview]) require_once "views/header.php";

if($_GET[qpage] && is_file("views/$_GET[qpage].php") && !$_GET[noview]) require_once "views/$_GET[qpage].php";

if(!$_GET[noview] && !$_GET[loginview]) require_once "views/footer.php";

?>