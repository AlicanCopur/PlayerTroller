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
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command as PMCommand;
use pocketmine\command\CommandSender as Sender;

class Loader extends PluginBase {
	private static $ins;
	private $command;
	public $listener;
	
	public static function getInstance(): Loader{
		return self::$ins;
	}
	public function onEnable(){
		self::$ins = $this;
		$this->listener = new Listener();
		$this->command = new Command();
		$this->getServer()->getPluginManager()->registerEvents($this->listener, $this);
	}
	public function onCommand(Sender $p, PMCommand $cmd, string $label, array $args): bool{
		if(!$p instanceof Player){
			$p->sendMessage("§cPlease use this command in game.");
			return false;
		}
		if(count($args) < 2){
			$this->command->help($p);
			return false;
		}
		$tp = $this->getServer()->getPlayer($args[1]);
		if(!$tp instanceof Player){
			$p->sendMessage("§cPlayer not found.");
			return false;
		}
		$this->command->cmd($p, $args[0], $tp);
		return true;
	}
}
