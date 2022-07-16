<?php
function getRealHost(){
    list($realHost,)=explode(':',$_SERVER['HTTP_HOST']);
    return $realHost;
 } 
 $url= getRealHost();


?>