<?php

require_once '../../models/Cliente.php';

$clientes = Cliente::all();

require_once '../../views/clientes/index.view.php';