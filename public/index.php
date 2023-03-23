<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

require __DIR__."/../vendor/autoload.php";

$PF=new JAM\PortfolioItems();

$PF->fetch();//get api data

$twigloader = new Twig\Loader\FilesystemLoader('./templates');
$twig = new Twig\Environment($twigloader);



if (empty($_GET['id'])) {
    
    // main
    $items=$PF->list();
    $template=$twig->load('main.twig');
    echo $template->render([
        'items'=>$items
    ]);

} else {
    
    // card detail
    $item=$PF->find($_GET['id']);//Project data
    /*
    $item->description=$item->description_short;
    */
    if ($item->description_long) {
        $Parsedown = new Parsedown();
        $item->description=$Parsedown->text($item->description_long);
    }
    

    $template=$twig->load('project.twig');
    
    echo $template->render([
        'GET'=>print_r($_GET,true),
        'item'=>$item,
        'debug'=>print_r($item,true)
    ]);    

}
