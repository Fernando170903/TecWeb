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

?>