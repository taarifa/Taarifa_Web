<?php
//The postcode is the simple concatenation of the row/col index of
//a cell in the grid drawn over TZ
//Very very rough, very very hacky, total disregard for the earths curvature
//but hey, it does something :)
class Postcode {
	private $tr_lat,$tr_long;
	private $bl_lat, $bl_long;
	private $lat_step, $long_step;
	private $latdiff,$longdiff;
	private $pad;
 
 	public function __construct() {
 		//make a *very* rough bounding box arond TZ
 		//using top-right and bottom-left corners
		$this->tr_lat = -1.186;
		$this->tr_long = 41.176;
		
		$this->bl_lat = -12.254;
		$this->bl_long = 29.004;
		
		//*roughly* 1400 by 1300 km
		//we want grid cells of 100m^2, so divide by 1400*1000/100
		$this->lat_step = 14000;
		$this->long_step = 13000;
	
		$this->latdiff = abs($this->bl_lat - $this->tr_lat) / $this->lat_step ;
		$this->longdiff = abs($this->bl_lat - $this->tr_lat) / $this->long_step;
		
		$this->pad = 5;
	}
	
	public function coords2id($lat, $long) {
		$lat_id = floor(($lat - $this->bl_lat) / $this->latdiff);
    	$long_id = floor(($long - $this->bl_long) / $this->longdiff);
		//simply join both coords padded to a fixed length    	
    	$id = str_pad(strval($lat_id),$this->pad,"0",STR_PAD_LEFT) . str_pad(strval($long_id),$this->pad,"0",STR_PAD_LEFT);
    	
    	return $id;
    }
    
	public function tocoords($lat_id, $long_id) {
    	$lat = $this->bl_lat + ($lat_id * $this->latdiff);
    	$long = $this->bl_long + ($long_id * $this->longdiff);
    	
    	return array($lat,$long);
    }
    
    public function id2coords($id){
    	$lats = intval(ltrim(substr($id,0,$this->pad),"0"));
    	$long = intval(ltrim(substr($id,$this->pad),"0"));

		return $this->tocoords($lats,$long);
    }
}


?>
