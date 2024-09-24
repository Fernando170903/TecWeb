<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Salida del Script</title>
</head>
<body>
    <?php
    // Variables de ejemplo
    $variable1 = "Variable 1";
    $variable2 = "Variable 2";
    $variable4 = "Variable 4";
    $variable5 = "Variable 5";
    $variable6 = "Variable 6";
    $manejadorSQL = "ManejadorSQL";
    $mysql = "MySQL";
    $php_version = "PHP5";
    $version_php = "5a version de PHP";

    // Mensajes de advertencia simulados
    $int_value = 50;
    $string_value = "5050";
    $large_int = 25502500;

    // Salida de variables
    echo "<p>$variable1<br />$variable2<br />$variable4<br />$variable5<br />$variable6<br />$manejadorSQL<br />$mysql<br />$manejadorSQL<br />PHP server<br />PHP server</p>";

    echo "<p>string(4) \"$php_version\"<br />string(4) \"$php_version\"<br />string(17) \"$version_php\"</p>";

    // Simulación de advertencia
    echo "<p><strong>Warning</strong>: A non-numeric value encountered in <strong>C:\\xampp\\htdocs\\tecweb\\practicas\\p05\\index.php</strong> on line <strong>55</strong></p>";

    echo "<p>int($int_value)<br />string(4) \"$string_value\"<br />int($large_int)<br />string(5) \"$mysql\"</p>";

    $array1 = array("MySQL");
    echo "<p>array(1):<br />[0] => string(5) \"{$array1[0]}\"</p>";

    echo "<p>string(4) \"$php_version\"<br />string(4) \"$php_version\"<br />string(17) \"$version_php\"</p>";

    // Simulación de segunda advertencia
    echo "<p><strong>Warning</strong>: A non-numeric value encountered in <strong>C:\\xampp\\htdocs\\tecweb\\practicas\\p05\\index.php</strong> on line <strong>99</strong></p>";

    echo "<p>int($int_value)<br />string(4) \"$string_value\"<br />int($large_int)<br />string(5) \"$mysql\"</p>";

    $array2 = array("MySQL", "MySQL");
    echo "<p>array(2):<br />[0] => string(5) \"{$array2[0]}\"<br />[1] => string(5) \"{$array2[1]}\"</p>";

    $inciso5 = 9000;
    echo "<p>Inciso 5<br />$inciso5<br />$inciso5<br />$inciso5</p>";

    $a = false; $b = false; $c = false; $d = false; $e = false; $f = false;
    echo "<p>Inciso 6<br />Valor booleano de \$a: bool(" . var_export($a, true) . ")<br />Valor booleano de \$b: bool(" . var_export($b, true) . ")<br />Valor booleano de \$c: bool(" . var_export($c, true) . ")<br />Valor booleano de \$d: bool(" . var_export($d, true) . ")<br />Valor booleano de \$e: bool(" . var_export($e, true) . ")<br />Valor booleano de \$f: bool(" . var_export($f, true) . ")<br />Valor de \$c como texto: " . ($c ? 'true' : 'false') . "<br />Valor de \$e como texto: " . ($e ? 'true' : 'false') . "</p>";

    $apache_version = "Apache/2.4.58 (Win64) OpenSSL/3.1.3 PHP/8.2.12";
    $os_version = "WINNT";
    $language = "es-ES,es;q=0.9";
    echo "<p>Inciso 7<br />Versión de apache y PHP: $apache_version<br />Versión del sistema operativo (servidor): Sistema operativo del servidor: $os_version<br />Idioma: $language</p>";
    ?>

    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img
        src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>
</body>
</html>