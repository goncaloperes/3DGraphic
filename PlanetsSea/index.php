<!DOCTYPE html>
<!--
Author: Gonçalo Peres n.º 1800301
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>5.1: Execução de código nos servidores</title>
    <?php

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os = "Não definido";
    $browser = "Não definido";

        switch (true) {
            case (strpos($user_agent, 'Windows')):
                $os = "Windows";
                break;
            case (strpos($user_agent, 'MacOS')):
                $os = "MacOS";
                break;
            case (strpos($user_agent, 'Linux')):
                $os = "Linux";
                break;
            default:
                $browser = "Indefinido";
        }

        switch (true) {
            case (strpos($user_agent, 'Edge')):
                $browser = "Edge";
                break;
            case strpos($user_agent, 'Firefox'):
                $browser = "Firefox";
                break;
            case strpos($user_agent, 'Chrome'):
                $browser = "Chrome";
                break;
            case strpos($user_agent, 'Opera'):
                $browser = "Opera";
                break;
            case strpos($user_agent, 'Safari'):
                $browser = "Safari";
                break;
            case strpos($user_agent, 'Netscape'):
                $browser = "Netscape";
                break;
            default:
                $browser = "Indefinido";
        }

        $os_icons = array(
                "Windows" => "media/os/windows.png",
                "MacOS" => "media/os/macos.png",
                "Linux" => "/media/os/linux.png",
                "Indefinido" => "media/os/not_defined.png",
        );

        $os_image = $os_icons[$os];

        $browser_icons = array(
                "Edge" => "media/browser/edge.png",
                "Firefox" => "media/browser/firefox.png",
                "Chrome" => "media/browser/chrome.png",
                "Opera" => "media/browser/opera.png",
                "Safari" => "media/browser/safari.png",
                "Netscape" => "media/browser/netscape.png",
                "Indefinido" => "media/browser/not_defined.png"
        );

        $browser_image = $browser_icons[$browser];

        echo '<link rel="stylesheet" type="text/css" href="css/' . $browser . '.css" />';

        ?>
    </head>
    <body>
        <p>
            <h1>Universidade Aberta</h1>
            <h2>MW - Mestrado em Tecnologias e Sistemas Informáticos Web</h2>
            <h3>2216 - Programação Web</h3>
            <h4>Ano Letivo 2018/2019 (1.º Semestre)</h4>
            <hr>
            <h5>5.1. Execução de código nos servidores</h5>
            <hr>
        </p>
        <br>
        <?php
        echo "<b>Vamos analisar os cabeçalhos dos pedidos HTTP!</b>";
        echo "<br>";
        echo "<br>";
        echo "<b>Pedido: </b>";

        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET':
                echo "GET";
                break;
            case 'POST':
                echo "POST";
                break;
            case 'DELETE':
                echo "DELETE";
                break;
            case 'PUT':
                echo "PUT";
                break;
            case 'HEAD':
                echo "HEAD";
                break;
        }

        echo "<br>";
        echo "<br>";
        echo "<b>Sistema Operativo: </b>";
        echo $os;
        echo "<br>";
        echo "<br>";
        echo "<img align= center src='" . $os_image . "' alt='" . $os_image . "' title='" . $os . "' />";
        echo "<br>";
        echo "<br>";
        echo "<b>Browser: </b>";
        echo "$browser";
        echo "<br>";
        echo "<br>";
        echo "<img align= center src='" . $browser_image . "' alt='" . $browser_image . "' title='" . $browser . "' />";
        ?>
        <br>
        <br>
        <hr>
        <b>Todo o cabeçalho dos pedidos HTTP</b>
        <br>
        <?php
        foreach (getallheaders() as $name => $value) {
            echo "$name: $value\n";
        }
        ?>

    </body>
</html>