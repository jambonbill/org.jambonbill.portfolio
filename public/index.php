<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

//logger
//echo '<pre>';print_r($_SERVER);exit;
$row=date('c')."\t";
$row.=$_SERVER['REMOTE_ADDR']."\t";
$row.=$_SERVER['HTTP_USER_AGENT']."\t";
$row.=$_SERVER['REQUEST_URI']."\t";
$row.=PHP_EOL;
@error_log($row,3,"../logs/access.log");


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
    $key=$PF->find($_GET['id']);
    $rels=$PF->getRelations($key);
    //print_r($rels);exit;
    $item=$PF->get($key);//Project data
    
    //$items=$PF->random();//Random Project data
    
    //try replace thumbnails with animation
    /*
    $banemame=basename($item->img_url);
    if (is_file()) {

    }
    */
    
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
