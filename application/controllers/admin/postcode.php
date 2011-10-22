<?php
class Postcode {
	private $tr_lat,$tr_long;
	private $bl_lat, $bl_long;
	private $lat_step, $long_step;
	private $latdiff,$longdiff;
	private $pad;
 
 	public function __construct() {
		$this->tr_lat = -1.1864386394452024;
		$this->tr_long = 41.1767578125;
		
		$this->bl_lat = -12.254128;
		$this->bl_long = 29.003906;
	
		$this->lat_step = 14000;
		$this->long_step = 13000;
	
		$this->latdiff = abs($this->bl_lat - $this->tr_lat) / $this->lat_step ;
		$this->longdiff = abs($this->bl_lat - $this->tr_lat) / $this->long_step;
		
		$this->pad = 5;
	}
	
	public function coords2id($lat, $long) {
		$lat_id = floor(($lat - $this->bl_lat) / $this->latdiff);
    	$long_id = floor(($long - $this->bl_long) / $this->longdiff);    	
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

$pc = new Postcode();

$lat = -7.013668;
$long = 34.89257;

print "orig: " . strval($lat) . "  " . strval($long) . "\n";

$id = $pc->coords2id($lat,$long);

print "id: " . $id  . "\n";

$coords = $pc->id2coords($id);

print "back: " . strval($coords[0]) . "  " . strval($coords[1])  . "\n";

?>