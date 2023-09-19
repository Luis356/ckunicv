<?php
require('valida.php');

unset($_COOKIE['usuario']);
setcookie('usuario');

unset($_COOKIE['senha']);
setcookie('senha');

header('Location: inicial.html');