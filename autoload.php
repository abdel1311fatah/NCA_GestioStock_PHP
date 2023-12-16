<?php 

function autocargar($classname){
    include "mvc/controller/" .  $classname . ".php";
}

spl_autoload_register("autocargar");