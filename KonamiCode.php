<?php
require "vendor\autoload.php";

use Zenithies\Toolkit\ReadKey\Interceptor;

$key_position = 0;
$KONAMI_CODE = [
    Interceptor::KEY_UP, Interceptor::KEY_UP, Interceptor::KEY_DOWN,
    Interceptor::KEY_DOWN,Interceptor::KEY_LEFT, Interceptor::KEY_RIGHT,
    Interceptor::KEY_LEFT, Interceptor::KEY_RIGHT,98,97
];

$keys = Interceptor::I();
echo "\033[31m\e[1m Konami Code \e[32m presione q para salir \n";

if($keys->init()){
    while (true) {
        $key = $keys->intercept();
        if(in_array($key, [113,81])){
            Interceptor::eprintln("Salida registrada: {$key}");
            exit(0);
        }
        if(!on_press($key)){
            exit(0);
        }
    }
}

function on_press($key){
    global $key_position, $last_key, $KONAMI_CODE;
    if ($key == $KONAMI_CODE[$key_position]) {
        $key_position += 1;
    }elseif ($key == $KONAMI_CODE[0]) {
        $key_position = ($last_key == $KONAMI_CODE[0]) ? 2 : 1;
    }else{
        $key_position = 0;
    }

    if ($key_position == count($KONAMI_CODE)){
        echo "\e[39m";
        echo "\e[41m╦╔═╔═╗╔╗╔╔═╗╔╦╗╦  ╔═╗╔═╗╔╦╗╔═╗\n";
        echo "\e[41m╠╩╗║ ║║║║╠═╣║║║║  ║  ║ ║ ║║║╣ \n";
        echo "\e[41m╩ ╩╚═╝╝╚╝╩ ╩╩ ╩╩  ╚═╝╚═╝═╩╝╚═╝\n";
        return false;
    }
    $last_key = $key;
    return true;
}


// multi-line html...
/*render(<<<'HTML'
    <div>
        <div class="px-1 bg-green-600">Konami Code</div>
        <em class="ml-1"> Give your CLI apps a unique look </em>
    </div>
HTML);*/

/*$name = ask(<<<HTML
    <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
        Cual es tu nombre?
    </span>
HTML);*/

//render("<div><strong>Hola $name</strong></div>");

