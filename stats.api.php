<?php
/*
Please connect this to your panel/shop
*/
function handle_sql($name,$format)
{
    $mysqli = new mysqli("localhost", "", "", "");
    if ($name=="serversnumber")
    {
        $query = "SELECT * FROM servers";

        if ($mysqli->connect_errno) {
          printf("Echec de la connexion: %s\n", $mysqli->connect_error);
         exit();
        }


        if ($result = $mysqli->query($query)) {
	        $base_id = 0;
	        $value_id = 0;
         while ($row = $result->fetch_assoc()) {
              $id = $row["id"];

	        	if ($id>$base_id){
        			$value_id = $id;
	        		$base_id = $id;
	        	}

           }
            $result->free();
        }

        if ($format=="full")
        {
            echo '<strong class="number" data-number="'.$value_id.'" ></strong>';
        }
        else
        {
            echo $value_id;
        }
    }
    elseif ($name=="serversnumber")
    {
        $query = "SELECT id FROM users";

        if ($mysqli->connect_errno) {
             printf("Echec de la connexion: %s\n", $mysqli->connect_error);
             exit();
        }


        if ($result = $mysqli->query($query)) {
	        $count = 0;
            while ($row = $result->fetch_assoc()) {
		        $count = $count + 1;
         }
         $result->free();
        }

        if ($format=="full")
        {
            echo '<strong class="number" data-number="'.$count.'" ></strong>';
        }
        else
        {
            echo $count;
        }
    }

}

function core($name,$format)
{
    return handle_sql($name,$format);
}

return core($_GET["name"],$_GET["format"])

?>