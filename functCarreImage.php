<?php
/* LVdesign.com.fr creation de thumbnail carre avec recadrage automatique.
/* URL			  : lvdesign.com.fr
/* Titre          : Création de miniatures carrées à partir d'une image quelconque...     */
/* 
/* Base sur                                                                           */
/* URL            : http://www.phpsources.org/scripts580-PHP.htm              */
/* Auteur         : mercier133                                                */
/* Date édition   : 26 Mars 2010                                              */

/*
 * Permet de créer une miniature carrée d'une image de forme quelconque. 	
 * $src 	désigne le nom de l'image source				
 * $dest 	désigne le nom de l'image d'origine				
 * $carre 	désigne la dimension du carré de la miniature			
 * $pos 	par default centre de l'image
*/  

function images_resize_carre($src, $dest, $carre){

//determiner la taille de l'image
  list($width, $height, $type) = getimagesize($src);
  
 
//determine comment recadrer l'image  
//photo en paysage
  if($width >= $height){
  	$dim = $height;
  	$paysage = true;
  }
  elseif($width <= $height){
  	$dim = $height; 
  	$portrait = true;
  }
  else{
  	$dim=$width;
  }
  
 //photo en portrait   
  if($paysage)
  {
   switch($pos){
    default: 
      $point_x_ref=($width/2)-($dim/2);
      $point_y_ref="0";
    break;
    }
  }
  elseif($portrait)
  {
   switch($pos){
   
    default: 
      $point_x_ref="0";
      $point_y_ref=($height/2)-($dim/2); 
    break;
   }
  }
  
  // ici pour un format image source en .jpg
  // mais on peut creer avec d'autres formats d'image
  $imgSrc = @imagecreatefromjpeg($src); 
  if (!$imgSrc){ 
  	echo 'ce n\'est pas le bon type de fichier, jpg uniquement!';
  	return false; 
  }
  // creer une nouvelle image 
  $imDest=@imagecreatetruecolor($carre, $carre); 
 // utiliser cette nouvelle image et donner la bonne dimension
  imagecopyresampled($imDest, $imgSrc, 0, 0, $point_x_ref, $point_y_ref, $carre , $carre, $dim, $dim);
  //liberer la mémoire detruire la source 
  imagedestroy($imgSrc); 
  // visionner la nouvelle image 
  imagejpeg($imDest, $dest, $dim); 
  // liberer la mémoire detruire la transformation de l'image
  imagedestroy($imDest);
  
  return true;
}
//Exemple : 
images_resize_carre("photocopie2.JPG","monthumbnail.jpg", 100);

echo(' <img src="monthumbnail.jpg" />');
?>