<?php

function core($name,$format)
{
echo $name . $format;
}

return core($_GET["name"],$_GET["format"])

?>