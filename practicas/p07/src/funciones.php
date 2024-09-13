<?php
function gen_multiploaletorio($num)
{
    if ($num % 5 == 0 && $num % 7 == 0) {
        return '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        return '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}

function generarSecuencia()
{
    $matriz = [];
    $iteraciones = 0;
    $totalNumeros = 0;

    // Continuar generando números hasta encontrar una secuencia impar, par, impar
    do {
        $fila = [];
        $fila[] = rand(1, 999); // Primer número aleatorio
        $fila[] = rand(1, 999); // Segundo número aleatorio
        $fila[] = rand(1, 999); // Tercer número aleatorio

        $matriz[] = $fila;
        $iteraciones++;
        $totalNumeros += 3;

        // Verificar si la secuencia es impar, par, impar
        $esSecuenciaValida = ($fila[0] % 2 != 0) && ($fila[1] % 2 == 0) && ($fila[2] % 2 != 0);
    } while (!$esSecuenciaValida);

    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'totalNumeros' => $totalNumeros
    ];
}

function encontrarMultiploWhile($numeroDado)
{
    $numeroAleatorio = rand(1, 999);
    while ($numeroAleatorio % $numeroDado !== 0) {
        $numeroAleatorio = rand(1, 999);
    }
    return $numeroAleatorio;
}

// Función para encontrar el múltiplo usando el ciclo do-while
function encontrarMultiploDoWhile($numeroDado)
{
    $numeroAleatorio = 0;
    do {
        $numeroAleatorio = rand(1, 999);
    } while ($numeroAleatorio % $numeroDado !== 0);
    return $numeroAleatorio;
}

function generarArregloAscii()
{
    $arreglo = [];

    // Usar un ciclo for para llenar el arreglo
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i); // Asignar el carácter ASCII al índice
    }

    return $arreglo;
}

// Función del ejercicio 5
function verificarEdadSexo($edad, $sexo)
{
    if ($sexo == 'femenino' && $edad >= 18 && $edad <= 35) {
        return "Bienvenida, usted está en el rango de edad permitido.";
    } else {
        return "Error: no está dentro del rango permitido o no es femenino.";
    }
}

function obtenerParqueVehicular()
{
    // Arreglo de autos con datos duros
    $vehiculos = [
        "ABC1234" => [
            "Auto" => [
                "marca" => "Toyota",
                "modelo" => 2021,
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Juan Pérez",
                "ciudad" => "Puebla",
                "direccion" => "Calle Falsa 123"
            ]
        ],
        "XYZ5678" => [
            "Auto" => [
                "marca" => "Honda",
                "modelo" => 2019,
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Ana García",
                "ciudad" => "Puebla",
                "direccion" => "Avenida Real 456"
            ]
        ],
        "LMN2345" => [
            "Auto" => [
                "marca" => "Ford",
                "modelo" => 2020,
                "tipo" => "hatchback"
            ],
            "Propietario" => [
                "nombre" => "Carlos Méndez",
                "ciudad" => "Puebla",
                "direccion" => "Boulevard Insurgentes 789"
            ]
        ],
        "JKL3456" => [
            "Auto" => [
                "marca" => "Chevrolet",
                "modelo" => 2018,
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "María Fernández",
                "ciudad" => "Puebla",
                "direccion" => "Calle Independencia 101"
            ]
        ],
        "PQR6789" => [
            "Auto" => [
                "marca" => "Mazda",
                "modelo" => 2022,
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "José López",
                "ciudad" => "Puebla",
                "direccion" => "Avenida Reforma 202"
            ]
        ],
        "STU3456" => [
            "Auto" => [
                "marca" => "Nissan",
                "modelo" => 2020,
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Rosa Ramírez",
                "ciudad" => "Puebla",
                "direccion" => "Boulevard Norte 303"
            ]
        ],
        "VWX5678" => [
            "Auto" => [
                "marca" => "Volkswagen",
                "modelo" => 2017,
                "tipo" => "hatchback"
            ],
            "Propietario" => [
                "nombre" => "Luis Hernández",
                "ciudad" => "Puebla",
                "direccion" => "Calle Juárez 404"
            ]
        ],
        "DEF1234" => [
            "Auto" => [
                "marca" => "Hyundai",
                "modelo" => 2021,
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Paola Sánchez",
                "ciudad" => "Puebla",
                "direccion" => "Avenida Hidalgo 505"
            ]
        ],
        "GHI5678" => [
            "Auto" => [
                "marca" => "Kia",
                "modelo" => 2019,
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Diego Morales",
                "ciudad" => "Puebla",
                "direccion" => "Boulevard Independencia 606"
            ]
        ],
        "JKL9876" => [
            "Auto" => [
                "marca" => "Subaru",
                "modelo" => 2016,
                "tipo" => "hatchback"
            ],
            "Propietario" => [
                "nombre" => "Laura Gutiérrez",
                "ciudad" => "Puebla",
                "direccion" => "Calle Morelos 707"
            ]
        ],
        "MNO3456" => [
            "Auto" => [
                "marca" => "Mitsubishi",
                "modelo" => 2021,
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Fernando Aguilar",
                "ciudad" => "Puebla",
                "direccion" => "Avenida Zaragoza 808"
            ]
        ],
        "PQR1234" => [
            "Auto" => [
                "marca" => "Fiat",
                "modelo" => 2020,
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Andrea Reyes",
                "ciudad" => "Puebla",
                "direccion" => "Calle Hidalgo 909"
            ]
        ],
        "STU7890" => [
            "Auto" => [
                "marca" => "BMW",
                "modelo" => 2018,
                "tipo" => "hatchback"
            ],
            "Propietario" => [
                "nombre" => "David González",
                "ciudad" => "Puebla",
                "direccion" => "Boulevard Cinco de Mayo 1010"
            ]
        ],
        "VWX4567" => [
            "Auto" => [
                "marca" => "Audi",
                "modelo" => 2022,
                "tipo" => "camioneta"
            ],
            "Propietario" => [
                "nombre" => "Jorge Martínez",
                "ciudad" => "Puebla",
                "direccion" => "Avenida Juárez 1111"
            ]
        ],
        "YZA2345" => [
            "Auto" => [
                "marca" => "Mercedes",
                "modelo" => 2019,
                "tipo" => "sedan"
            ],
            "Propietario" => [
                "nombre" => "Mónica Castillo",
                "ciudad" => "Puebla",
                "direccion" => "Calle Libertad 1212"
            ]
        ]
    ];

    return $vehiculos;
}

?>