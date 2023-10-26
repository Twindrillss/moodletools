<?php

require("config.php");

//questa pagina ottiene i seguenti parametri via GET per determinare l'accesso di un utente ad un determinato corso. Il corso viene identificato attraverso il suo shortname
//il file config.php serve per configurare la connessione con il database di riferimento

$nomeutente = $_GET['utente'];
$shortcorso = $_GET['corso'];


$result = mysqli_query($mysqli, "SELECT * FROM mdle1_user WHERE email = '$nomeutente'");

  while ($res = mysqli_fetch_array($result)){
        
        $idutente = $res['id'];
        
  }
  

$result = mysqli_query($mysqli, "SELECT * FROM mdle1_course WHERE shortname = '$shortcorso'");  
  
  while ($res = mysqli_fetch_array($result)){
      
      $idcorso = $res['id'];
      
  }
  


$result = mysqli_query($mysqli, "SELECT * FROM mdle1_logstore_standard_log WHERE eventname LIKE '%course_viewed%' AND userid=$idutente AND courseid = $idcorso ORDER BY id ASC LIMIT 1");
        
        while ($res = mysqli_fetch_array($result)){
            
            $primoaccesso = $res['timecreated'];
            
        }
        

if (!empty($primoaccesso)){

echo gmdate("Y-m-d", $primoaccesso);
} else {
    echo 'Questo utente non ha ancora visualizzato il corso'.$shortcorso.'('.$idcorso.','.$idutente.')';
}
//echo $primoaccesso;

?>
