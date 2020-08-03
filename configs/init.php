<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, PATCH, DELETE');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Accept, X-Auth-Token, Origin, Authorization');

date_default_timezone_set('America/Sao_Paulo');

# ---------
# Load all models
$directories = dir(realpath(dirname(__FILE__). "/../models/"));
while($file = $directories -> read()) {

  if(strstr($file, "model.") && substr($file, -4, 4) === ".php") {
    
    require_once($directories->path . "/" . $file);
  }
}

$directories->close();

?>