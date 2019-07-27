<?php

/** 
*     _    _ _                  ____ 
*    / \  | (_) ___ __ _ _ __  / ___|
*   / _ \ | | |/ __/ _` | '_ \| |    
*  / ___ \| | | (_| (_| | | | | |___ 
* /_/   \_\_|_|\___\__,_|_| |_|\____|
*                                 
*                                  
*  -I'm getting stronger if I'm not dying-
*
* @version 1.0
* @author AlicanCopur
* @copyright HashCube Network © | 2015 - 2019
* @license Açık yazılım lisansı altındadır. Tüm hakları saklıdır. 
*/                                   

namespace AlicanCopur\PlayerTroller;

use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\entity\Entity;
use pocketmine\network\mcpe\protocol\AddEntityPacket;

class Troller {
	private $listener;
	
	public function __construct(){
		$this->listener = Loader::getInstance()->listener;
	}
	public function freeze(Player $p): void{
		$this->listener->freeze[] = $p->getName();
	}
	public function unfreeze(Player $p): void{
		if(in_array($p->getName(), $this->listener->freeze)){
			$key = array_search($p->getName(), $this->listener->freeze);
			unset($this->listener->freeze[$key]);
		}
	}
	public function mute(Player $p): void{
		$this->listener->mute[] = $p->getName();
	}
	public function unmute(Player $p): void{
		if(in_array($p->getName(), $this->listener->mute)){
			$key = array_search($p->getName(), $this->listener->mute);
			unset($this->listener->mute[$key]);
		}
	}
	public function rocket(Player $p): void{
          //TO-DO: Bypass anti hacks.
		for($i = 0; $i < 25; $i++){
			$p->jump();
		}
	}
	public function lightning(Player $p): void{
    	$pk = new AddEntityPacket();
   	 $pk->type = 93;
    	$pk->entityRuntimeId = Entity::$entityCount++;
   	 $pk->motion = null;
    	$pk->position = new Vector3($p->getX(), $p->getY(), $p->getZ());
    	foreach($p->getLevel()->getPlayers() as $pl){
     	 $pl->dataPacket($pk);
   	 }
    }
}
