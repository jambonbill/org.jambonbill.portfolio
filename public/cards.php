<?php
//cards
//https://getbootstrap.com/docs/4.0/components/card/


function card($o){
	
	$htm='<div class="card">';
  	$htm.='<div class=img>';
    
    if(empty($o->url_img)){      
      $o->url_img='img/thumbnail-600x350.png';
    }

    
    $htm.='<a href="?id='.$o->id.'">';
    $htm.='<img src="'.htmlentities($o->url_img).'" alt="'.htmlentities($o->title).'">';
    $htm.='</a>';
    
    $htm.='</div>';
  	$htm.='<div class="card-body">';
    
    $htm.='<h5 class="card-title">'.htmlentities($o->title).'</h5>';
    $htm.='<p class="text-muted"><i>'.htmlentities($o->tags).'</i></p>';
    if(empty($o->description_short)){
    $htm.='<p class="card-text">pas de description</p>';
    }else{
      $htm.='<p class="card-text">'.htmlentities($o->description_short).'</p>';
    }
    
    $htm.='<a href="#" class="card-link">Details</a>';  
  	
  	$htm.='</div>';
    //card-footer
    $htm.='<div class="card-footer text-muted">';
    
    if(!empty($o->url)){
      $htm.='<a href="'.$o->url.'" class="card-link"><i class="fa fa-external-link"></i></a>';
    }
    
    if(!empty($o->url_git)){
      $htm.='<a href="'.$o->url_git.'" class="card-link"><i class="fab fa-github"></i></a>';
    }
    
    $htm.='</div>';

	$htm.='</div>';
	return $htm;
}

require_once "dbdata.php";


/**
 * Print as many cards as $data contain
 * @param  Array  $data [description]
 * @return [type]       [description]
 */
function printCards(Array $data)
{
    foreach($data as $r){
        echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">';
        echo card($r);
        echo '</div>';
    }
}
