// function getDatos() {
//     var nombre = window.prompt("Nombre: ", "");
//     var edad = prompt("Edad: ", "");

//     var div1 = document.getElementById('nombre');
//     div1.innerHTML = '<h3> Nombre: ' + nombre + '</h3>';

//     var div2 = document.getElementById('edad');
//     div2.innerHTML = '<h3> Edad: ' + edad + '</h3>';
// }

function HolaMundo() {
    var div3 = document.getElementById('HolaMundo');
    div3.innerHTML = ('Hola Mundo');
}

function var1() {
    var div4 = document.getElementById('nombre1');
    var div5 = document.getElementById('edad1');
    var div6 = document.getElementById('altura1');
    var div7 = document.getElementById('casado1');
    var nombre = 'Fernando';
    var edad = 21;
    var altura = 1.70;
    var casado = false;

    div4.innerHTML = (nombre );
    div5.innerHTML = (edad );
    div6.innerHTML = (altura );
    div7.innerHTML = (casado );
}

function Variables2() {
    var nombre = window.prompt('Ingresa tu nombre:', ' ');
    var edad = prompt('Ingresa tu edad:', '');
    div8 = document.getElementById('nombre2');
    div8.innerHTML = ('Hola ' + nombre + ' así que tienes ' + edad + ' años');
}

function Condiciones1() {
    var valor1 = prompt('Introducir primer número:', '');
    var valor2 = prompt('Introducir segundo número', '');
    div9 = document.getElementById('suma');
    div10 = document.getElementById('producto')

    var suma = parseInt(valor1) + parseInt(valor2);
    var producto = parseInt(valor1) * parseInt(valor2);

    div9.innerHTML = ('La suma es ' + suma);
    div10.innerHTML = ('El producto es ' + producto);
}

function Condiciones2() {
    var nombre = prompt('Ingresa tu nombre:', '');
    var nota = prompt('Ingresa tu nota:', '');

    div11 = document.getElementById('nota');
    if (nota >= 4) {
        div11.innerHTML = (nombre + ' esta aprobado con un ' + nota);
    }
}

function Condiciones3() {
    var num1, num2;
    num1 = prompt('Ingresa el primer número:', '');
    num2 = prompt('Ingresa el segundo número:', '');
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    div12 = document.getElementById('mayor');
    if (num1 > num2) {
        div12.innerHTML = ('el mayor es ' + num1);
    }
    else {
        div12.innerHTML = ('el mayor es ' + num2);
    }
}

function Condiciones4() {
    var nota1, nota2, nota3;

    nota1 = prompt('Ingresa 1ra. nota:', '');
    nota2 = prompt('Ingresa 2da. nota:', '');
    nota3 = prompt('Ingresa 3ra. nota:', '');

    //Convertimos los 3 string en enteros
    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    div13 = document.getElementById('aprobado');

    var pro;
    pro = (nota1 + nota2 + nota3) / 3;
    if (pro >= 7) {
        div13.innerHTML = ('aprobado');
    }
    else {
        if (pro >= 4) {
            div13.innerHTML = ('regular');
        }
        else {
            div13.innerHTML = ('reprobado');
        }
    }
}

function Condiciones5() {
    var valor;
    valor = prompt('Ingresar un valor comprendido entre 1 y 5:', '');
    //Convertimos a entero
    valor = parseInt(valor);
    div14 = document.getElementById('numero');
    switch (valor) {
        case 1: div14.innerHTML = ('uno');
            break;

        case 2: div14.innerHTML = ('dos');
            break;

        case 3: div14.innerHTML = ('tres');
            break;

        case 4: div14.innerHTML = ('cuatro');
            break;

        case 5: div14.innerHTML = ('cinco');
            break;

        default: div14.innerHTML = ('debe ingresar un valor comprendido entre 1 y 5.');
    }
}

function Condiciones6() {
    var col;
    col = prompt('Ingresa el color con que quierar pintar el fondo de la ventana (rojo, verde, azul)', '');
    switch (col) {
        case 'rojo': document.bgColor = '#ff0000';

            break;

        case 'verde': document.bgColor = '#00ff00';

            break;

        case 'azul': document.bgColor = '#0000ff';

            break;

    }
}

function Repeticion1() {
    var x;
    x = 1;
    div15 = document.getElementById('ciclo');
    while (x <= 100) {
        div15.innerHTML += x + '<br>';
        x = x + 1;
    }
}

function Repeticion2() {
    var div16 = document.getElementById('ciclo2');
    var x = 1;
    var suma = 0;
    var valor;
    while (x <= 5) {
        valor = prompt('Ingresa el valor:', '');
        valor = parseInt(valor);
        suma = suma + valor;
        x = x + 1;
    }
    div16.innerHTML = ('La suma de los valores es ' + suma + '<br>');
}

function Repeticion3() {
    div17 = document.getElementById('ciclo3');
    var valor;
    do {
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);

        if (!isNaN(valor) && valor >= 0 && valor <= 999) {  // Verifica que el valor esté en el rango permitido
            div17.innerHTML += ('El valor ' + valor + ' tiene ');

            if (valor < 10) {
                div17.innerHTML += ('1 dígito');
            } else if (valor < 100) {
                div17.innerHTML += ('2 dígitos');
            } else {
                div17.innerHTML += ('3 dígitos');
            }
            div17.innerHTML += ('<br>');
        }
    } while (valor != 0);
}

function Repeticion4() {
    div18 = document.getElementById('ciclo4')
    var f;
    for (f = 1; f <= 10; f++) {
        div18.innerHTML += (f + ' ');
    }
}

function Func1() {
    div18 = document.getElementById('funcion1')
    div18.innerHTML += ('Cuidado<br>');
    div18.innerHTML += ('Ingresa tu documento correctamente<br>');
    div18.innerHTML += ('Cuidado<br>');
    div18.innerHTML += ('Ingresa tu documento correctamente<br>');
    div18.innerHTML += ('Cuidado<br>');
    div18.innerHTML += ('Ingresa tu documento correctamente<br>');
}

function Func2() {
    div19 = document.getElementById('funcion2')
    function mostrarMensaje() {
        div19.innerHTML += ('Cuidado<br>');
        div19.innerHTML += ('Ingresa tu documento correctamente<br>');
    }
    mostrarMensaje();
    mostrarMensaje();
    mostrarMensaje();
}

function Func3() {
    div20 = document.getElementById('funcion3')
    function mostrarRango(x1, x2) {
        var inicio;
        for (inicio = x1; inicio <= x2; inicio++) {
            div20.innerHTML += (inicio + ' ');

        }
    }
    var valor1, valor2;
    valor1 = prompt('Ingresa el valor inferior:', '');
    valor1 = parseInt(valor1);
    valor2 = prompt('Ingresa el valor superior:', '');
    valor2 = parseInt(valor2);
    mostrarRango(valor1, valor2);
}

function Func4() {
    div21 = document.getElementById('funcion4')
    function convertirCastellano(x) {

        if (x == 1)
            return 'uno';
        else
            if (x == 2)
                return 'dos';
            else
                if (x == 3)
                    return 'tres';
                else
                    if (x == 4)
                        return 'cuatro';
                    else
                        if (x == 5)
                            return 'cinco';
                        else
                            return 'valor incorrecto';

    }
    var valor = prompt('Ingresa un valor entre 1 y 5', '');
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    div21.innerHTML = (r);
}

function Func5() {
    div22 = document.getElementById('funcion5')
    function convertirCastellano(x) {
        switch (x) {
            case 1: return "uno";
            case 2: return "dos";
            case 3: return "tres";
            case 4: return "cuatro";
            case 5: return "cinco";
            default: return "valor incorrecto";
        }
    }
    var valor = prompt('Ingresa un valor entre 1 y 5', '');
    valor = parseInt(valor);
    var r = convertirCastellano(valor);
    div22.innerHTML = (r);
}