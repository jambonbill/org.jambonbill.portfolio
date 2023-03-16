<?php
//cards
//https://getbootstrap.com/docs/4.0/components/card/


function card($o){
	
	$htm='<div class="card">';
  	$htm.='<div class=img>';
    if($o->url_img){
      $htm.='<img src="'.htmlentities($o->url_img).'">';
    }else{
      $htm.='<img src="img/jambonbill.png">';
    }
    $htm.='</div>';
  	$htm.='<div class="card-body">';
    $htm.='<h5 class="card-title">'.htmlentities($o->title).'</h5>';
    $htm.='<p class="text-muted">'.htmlentities($o->tags).'</p>';
    if(empty($o->description_short)){
		$htm.='<p class="card-text">pas de description</p>';
    }else{
    	$htm.='<p class="card-text">'.htmlentities($o->description_short).'</p>';
  	}
  	$htm.='</div>';
  
  	$htm.='<div class="card-body">';
    
    if(!empty($o->url)){
		$htm.='<a href="'.$o->url.'" class="card-link">Url1</a>';
	}
    
    
    if(!empty($o->url_git)){
    	$htm.='<a href="'.$o->url_git.'" class="card-link">Git</a>';
    }

    $htm.='<a href="#" class="card-link">Details</a>';
  	
  	$htm.='</div>';
	$htm.='</div>';
	return $htm;
}


$json=file_get_contents('json/data.json');
$o=json_decode($json);
$data=$o->data;
//echo '<pre>';print_r($data);exit;
foreach($data as $r){
	echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">';
	echo card($r);
	echo '</div>';
}
