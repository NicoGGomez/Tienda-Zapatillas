<?php 

class homeView {
    
    function showHome($log){
        $name = 'home';
        $login = $log;
        require_once 'templates/home.phtml';
    }

}