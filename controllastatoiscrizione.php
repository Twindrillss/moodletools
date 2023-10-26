<?php

function cerca_enrolment($idutente, $idcorso){
    
    require("config.php");
    
    
    
    
    $result = mysqli_query($mysqli, "SELECT * FROM mdle1_user_enrolments WHERE userid = $idutente");
    
    while ($res = mysqli_fetch_array($result)){
        
        $compara = $res['enrolid'];
       $result2 = mysqli_query($mysqli, "SELECT * FROM mdle1_enrol WHERE id = '$compara'");
        while ($res2 = mysqli_fetch_array($result2)){
            if ($res2['courseid'] == $idcorso){
              // if ($res2['status'] == 1){
              $salvaenrol = $res2['id']; 
            //}
            }
        }
        
    }
    
    
    if (!empty($salvaenrol)){
        
       $result = mysqli_query($mysqli, "SELECT * FROM mdle1_user_enrolments WHERE enrolid = $salvaenrol AND userid = $idutente");
        
       while ($res= mysqli_fetch_array($result)){
            $inizio = $res['timestart'];
   $fine = $res['timeend'];
       }
        
    }
    
    
    $inizio = gmdate("Y-m-d", $inizio);
    
   if (!empty ($fine)){
   $fine = gmdate("Y-m-d", $fine);
        
      $data1 = strtotime($inizio);
    $data2 = strtotime($fine);
    
    $prepintervallo = $data2 - $data1;   
    $intervallo = round($prepintervallo / (60 * 60 * 24));
        
    }
    else {
      $fine = "Nessuna fine iscrizione";
    $intervallo = "Infiniti";
    }
    
   
    
    if (empty($fine)){
        $fine = "--";
        $intervallo = "Nessuna fine iscrizione";
    }
    
    $risultato = array("inizio"=>$inizio, "fine"=>$fine, "giorni"=>$intervallo, "riferimento"=>$salvaenrol);
    
    return $risultato;
}






?>
