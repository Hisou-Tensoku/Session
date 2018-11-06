<?php

class Session {
    
    private $nombre;

    function __construct($nombre = null) {
        $this->nombre = $nombre;
        if (session_status() === PHP_SESSION_NONE) {
            if ($name !== null) {
                session_name($nombre);
            }
            session_start();
        }
    }
    
    function get($name) {
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];      
        }
        return null;
    }

    function set($nombre, $valor) {
        $_SESSION[$nombre] = $valor;
        return $this;
    }

    function destroy($nombre) {
        session_name($nombre);
        session_start();
        session_destroy();
    }

    function getLogin($nombre='usuario') {
        if(isset($_SESSION[$nombre])){
            return $_SESSION[$nombre];      
        }
        return null;
    }

    function setLogin($usuario, $nombre = 'usuario') {
        if (session_status() === PHP_SESSION_NONE) {
            session_regenerate_id();
            $_SESSION[$nombre] = $usuario;
            return $this;
        }
    }
    
    function logout($nombre='usuario') {
        if(isset($_SESSION[$nombre])) {
            unset($_SESSION[$nombre]);
        }    
    }
}
