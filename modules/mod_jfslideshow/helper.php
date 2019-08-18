<?php
/*------------------------------------------------------------------------
# mod_jfslideshow
# ------------------------------------------------------------------------
# author    Kreatif Multimedia GmbH
# copyright Copyright (C) 2013 kreatif-multimedia.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.joomfreak.com
# Technical Support:  Forum - http://www.joomfreak.com/forum.html
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

function jfLoadfont($fontname){
	
	if($fontname == 'none') return '';
	
	$doc = JFactory::getDocument();
	//$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans');
	
	//1
	static $opensans = 0;	
	if($fontname == "opensans"){ 
		if(!$opensans){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans');
			$opensans = 1;
		}return "opensans";
	}
	//2
	static $overlock = 0;
	if($fontname == "overlock"){ 
		if(!$overlock){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Overlock');
			$overlock = 1;
		}return "overlock";
	}	
	//3
	static $poiretone = 0;
	if($fontname == "poiretone"){ 
		if(!$poiretone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Poiret+One');
			$poiretone = 1;
		}return "poiretone";
	}
	//4
	static $flamenco = 0;
	if($fontname == "flamenco"){ 
		if(!$flamenco){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Flamenco');
			$flamenco = 1;
		}return "flamenco";
	}
	//5
	static $comfortaa = 0;
	if($fontname == "comfortaa"){ 
		if(!$comfortaa){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Comfortaa');
			$comfortaa = 1;
		}return "comfortaa";
	}
	//6
	static $concertone = 0;
	if($fontname == "concertone"){ 
		if(!$concertone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Concert+One');
			$concertone = 1;
		}return "concertone";
	}
	//7
	static $anticslab = 0;
	if($fontname == "anticslab"){ 
		if(!$anticslab){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Antic+Slab');
			$anticslab = 1;
		}return "anticslab";
	}
	//8
	static $berkshireswash = 0;
	if($fontname == "berkshireswash"){ 
		if(!$berkshireswash){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Berkshire+Swash');
			$berkshireswash = 1;
		}return "berkshireswash";
	}
	//9
	static $eaglelake = 0;
	if($fontname == "eaglelake"){ 
		if(!$eaglelake){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Eagle+Lake');
			$eaglelake = 1;
		}return "eaglelake";
	}
	//10
	static $economica = 0;
	if($fontname == "economica"){ 
		if(!$economica){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Economica');
			$economica = 1;
		}return "economica";
	}
	//11
	static $ewert = 0;
	if($fontname == "ewert"){ 
		if(!$ewert){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Ewert');
			$ewert = 1;
		}return "ewert";
	}
	//12
	static $kaushanscript = 0;
	if($fontname == "kaushanscript"){ 
		if(!$kaushanscript){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Kaushan+Script');
			$kaushanscript = 1;
		}return "kaushanscript";
	}
	//13
	static $londrinasketch = 0;
	if($fontname == "londrinasketch"){ 
		if(!$londrinasketch){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Londrina+Sketch');
			$londrinasketch = 1;
		}return "londrinasketch";
	}
	//14
	static $kronaone = 0;
	if($fontname == "kronaone"){ 
		if(!$kronaone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Krona+One');
			$kronaone = 1;
		}return "kronaone";
	}
	//15
	static $loversquarrel = 0;
	if($fontname == "loversquarrel"){ 
		if(!$loversquarrel){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Lovers+Quarrel');
			$loversquarrel = 1;
		}return "loversquarrel";
	}
	//16
	static $oswald = 0;
	if($fontname == "oswald"){ 
		if(!$oswald){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Oswald');
			$oswald = 1;
		}return "oswald";
	}
	//17
	static $rocksalt = 0;
	if($fontname == "rocksalt"){ 
		if(!$rocksalt){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Rock+Salt');
			$rocksalt = 1;
		}return "rocksalt";
	}
	//18
	static $syncopate = 0;
	if($fontname == "syncopate"){ 
		if(!$syncopate){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Syncopate');
			$syncopate = 1;
		}return "syncopate";
	}
	//19
	static $ubuntu = 0;
	if($fontname == "ubuntu"){ 
		if(!$ubuntu){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Ubuntu');
			$ubuntu = 1;
		}return "ubuntu";
	}
	//20
	static $russoone = 0;
	if($fontname == "russoone"){ 
		if(!$russoone){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Russo+One');
			$russoone = 1;
		}return "russoone";
	}
	//21
	static $amaticsc = 0;
	if($fontname == "amaticsc"){ 
		if(!$amaticsc){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Amatic+SC');
			$amaticsc = 1;
		}return "amaticsc";
	}
	//22
	static $yellowtail = 0;
	if($fontname == "yellowtail"){ 
		if(!$yellowtail){ // not load yet
			$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Yellowtail');
			$yellowtail = 1;
		}return "yellowtail";
	}
	
	
}

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";	
	$str = '';
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}