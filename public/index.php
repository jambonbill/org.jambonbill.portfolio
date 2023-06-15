<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

require __DIR__."/../vendor/autoload.php";

require_once __DIR__."/logger.php";//access log
require_once __DIR__."/skills.php";

$PF=new JAM\PortfolioItems();
$PF->fetch();//get api data

$twigloader = new Twig\Loader\FilesystemLoader('./templates');
$twig = new Twig\Environment($twigloader);


if (empty($_GET['id'])) {    
    // main    
    $items=$PF->list();
    $template=$twig->load('main.twig');
    echo $template->render([
        'skills'=>implode(", ", $skills),
        'items'=>$items        
    ]);

} else {
    
    // card detail
    $key=$PF->find($_GET['id']);
    $rels=$PF->getRelations($key);
    //print_r($rels);exit;
    $item=$PF->get($key);//Project data

    $item->url_short=preg_replace("/^https?:\/\//","",$item->url);//shorten url

    //echo '<pre>';var_dump($item);exit;
    
    if ($item->description_long) {
        $Parsedown = new Parsedown();
        $item->description=$Parsedown->text($item->description_long);
    }
    

    $template=$twig->load('project.twig');
    
    echo $template->render([
        'GET'=>print_r($_GET,true),
        'item'=>$item,
        'items'=>$PF->random(),
        'next'=>$PF->get($rels['next']),
        'prev'=>$PF->get($rels['prev']),
        'debug'=>print_r($item,true)
    ]);    

}
