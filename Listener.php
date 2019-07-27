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

use pocketmine\event\Listener as PMListener;
use pocketmine\event\{
	player\PlayerMoveEvent,
	player\PlayerChatEvent
};

class Listener extends PMListener {
	public $freeze = [];
	public $mute = [];
	
	public function onMove(PlayerMoveEvent $e){
		$p = $e->getPlayer();
		if(in_array($p->getName(), $this->freeze)){
			$e->setCancelled(true);
		}
	}
	public function onChat(PlayerChatEvent $e){
		$p = $e->getPlayer();
		if(in_array($p->getName(), $this->mute)){
			$e->setCancelled(true);
		}
	}
}