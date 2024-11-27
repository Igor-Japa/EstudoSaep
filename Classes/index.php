<?php

include './model/alocacao.class.php';
include './model/automoveis.class.php';
include './model/cliente.class.php';
include './model/concessionaria.class.php';
include './model/venda.class.php';
include './control/controller.php';

$c = new automovel;

$c->mudarAutomovel(50, "Uno Mile", 10000, 1);


?>