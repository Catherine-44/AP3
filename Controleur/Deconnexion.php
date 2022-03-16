<?php

include_once "./modele/authentification.inc.php";

daoauthentification::logout();

include "./vue/vueConnexion.php";
