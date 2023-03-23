<?php

include '../vendor/autoload.php';

// test twig
// https://twig.symfony.com/
// https://www.univ-orleans.fr/iut-orleans/informatique/intra/tuto/php/php-twig.html
// 

// le dossier ou on trouve les templates
$loader = new Twig\Loader\FilesystemLoader('../templates');

// initialiser l'environement Twig
$twig = new Twig\Environment($loader);

// load template
$template = $twig->load('main.html');

// set template variables
// render template
/*
echo $template->render(array(
    'lundi' => 'Steak Frites',
    'mardi' => 'Raviolis',
    'mercredi' => 'Pot au Feu',
    'jeudi' => 'Couscous',
    'vendredi' => 'Poisson',
));
*/
