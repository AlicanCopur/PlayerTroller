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

class Command {
	private $troller;
	
	public function __construct(){
		$this->troller = new Troller();
	}
	public function cmd(Player $p, string $troll, Player $tp): void{
		if($troll == "freeze"){
			
			$this->troller->freeze($tp);
			$p->sendMessage("§aFreezed §f".$tp->sendMessage());
			
		} elseif($troll == "unfreeze"){
			
			$this->troller->unfreeze($tp);
			$p->sendMessage("§aUnfreezed §f".$tp->sendMessage());
			
		} elseif($troll == "mute"){
			
			$this->troller->mute($tp);
			$p->sendMessage("§aMuted §f".$tp->sendMessage());
			
		} elseif($troll == "unmute"){

			$this->troller->unmute($tp);
			$p->sendMessage("§aUnmuted §f".$tp->sendMessage());

		} elseif($troll == "rocket"){
			
			$this->troller->rocket($tp);
			$p->sendMessage("§aRocket §f".$tp->sendMessage());
			
		} elseif($troll == "lightning"){
			
			$this->troller->lightning($tp);
			$p->sendMessage("§aLightning §f".$tp->sendMessage());
			
		} else {
			$this->help($p);
		}
	}
	public function help(Player $p): void{
		$p->sendMessage("§7--- §bPlayerTroller Commands §7---");
		$p->sendMessage("§6/troll freeze/unfreeze <player> : §fFreeze/unfreeze a player!");
		$p->sendMessage("§6/troll mute/unmute <player> : §fMute/unmute a player!");
		$p->sendMessage("§6/troll rocket <player> : §fRocket!");
		$p->sendMessage("§6/troll lightning <player> : §fCreate lightning!");
		$p->sendMessage("§7--- §bPlayerTroller Commands §7---");
	}
}