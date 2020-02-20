<?php

$fichier = file_get_contents('speech.txt');
$booleanFlag = 0;

if (strposa($fichier, array("assistant-mot1", "assistant-mot2", "assistant-mot3")) !== false) {
    if (strposa($fichier, array("annule", "stop")) !== false) {
        $booleanFlag = 1;
        file_put_contents("speech.txt", "");
    }
    if (strposa($fichier, array("commande1-mot1", "commande1-mot2", "commande1-mot3")) !== false) {
        preg_match_all('!\d+!', $fichier, $matches);
        foreach ($matches as $key => $value) {
            if($value[0] == null){
                shell_exec('./syntheseVocale.sh "reponse"');
                $booleanFlag = 1;
            }
        }
    }
    else {
        if($booleanFlag == 0){
            shell_exec('./syntheseVocale.sh "En attente d\'une commande vocale"');
        }
    }
}
else{
    file_put_contents("speech.txt", "");
}

function strposa($haystack, $needles = array(), $offset = 0)
{
    $chr = array();
    foreach ($needles as $needle) {
        $res = strpos($haystack, $needle, $offset);
        if ($res !== false) $chr[$needle] = $res;
    }
    if (empty($chr)) return false;
    return min($chr);
}