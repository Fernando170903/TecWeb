<?php
    $_myvar = 'dato1';
    $_7var = 'dato2';
    //myvar = 'dato3';
    $myvar = 'dato4';
    $var7 = 'dato5';
    $_element1 = 'dato6';
    //$house*5 = 'dato7';


    echo $_myvar;
    echo '<br>';
    echo $_7var;
    echo'<br>';
    //echo myvar;
    echo $myvar;
    echo '<br>';
    echo $var7;
    echo '<br>';
    echo $_element1;
    echo '<br>';
    //echo $house;

    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;
    echo $a;
    echo '<br>';
    echo $b;
    echo'<br>';
    echo $c;
    echo'<br>';

    $a = "PHP server";
    $b = &$a;
    echo $a;
    echo '<br>';
    echo $b;
    echo'<br>';

    $a = "PHP5";
    var_dump($a);
    echo '<br>';

    $z[]=&$a;
    var_dump($z[0]);
    echo'<br>';

    $b = "5a version de PHP";
    var_dump($b);
    echo'<br>';

    $c = $b*10;
    var_dump($c);
    echo'<br>';

    $a .= $b;
    var_dump($a);
    echo'<br>';

    $b *= $c;
    var_dump($b);
    echo'<br>';

    $z[0] = "MySQL";
    var_dump($z[0]);
    echo'<br>';

    //Contenido final de z
    var_dump($z);
    echo'<br>';
    
    //INCISO 4
    echo '<br>Inciso 4<br>';
    // Paso 1
    $a = "PHP5";
    $GLOBALS['a'] = $a;  // Asignar al arreglo global para su acceso
    var_dump($GLOBALS['a']);
    echo '<br>';
    // Paso 2
    $z[] = &$a;
    $GLOBALS['z'] = $z;  // Asignar al arreglo global para su acceso
    var_dump($GLOBALS['z'][0]);
    echo '<br>';
    // Paso 3
    $b = "5a version de PHP";
    $GLOBALS['b'] = $b;  // Asignar al arreglo global para su acceso
    var_dump($GLOBALS['b']);
    echo '<br>';

    // Paso 4
    $c = $b * 10;
    $GLOBALS['c'] = $c;  // Asignar al arreglo global para su acceso
    var_dump($GLOBALS['c']);
    echo '<br>';
    // Paso 5
    $a .= $b;
    $GLOBALS['a'] = $a;  // Actualizar la variable global
    var_dump($GLOBALS['a']);
    echo '<br>';
    // Paso 6
    $b *= $c;
    $GLOBALS['b'] = $b;  // Actualizar la variable global
    var_dump($GLOBALS['b']);
    echo '<br>';
    // Paso 7
    $z[0] = "MySQL";
    $GLOBALS['z'] = $z;  // Actualizar la variable global
    var_dump($GLOBALS['z'][0]);
    echo '<br>';
    // Mostrar contenido final de $z
    var_dump($GLOBALS['z']);
    echo '<br>';

?>