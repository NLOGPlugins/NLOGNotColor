<?php

namespace nlog\NLOGNotColor;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\utils\TextFormat;
use pocketmine\event\block\SignChangeEvent;
		
class Main extends PluginBase implements Listener {

	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->notice("NLOGNotColor 플러그인이 실행되었습니다!");
		$this->getServer()->getLogger()->notice("Made by NLOG (nlog.kro.kr)");
	}

	public function onPlayerChatEvent(PlayerChatEvent $ev) {
		if (!$ev->getPlayer()->isOp()) {
			$ev->setMessage(TextFormat::clean($ev->getMessage()));
		}
	}
	
	public function onSignChangeEvent(SignChangeEvent $event) {
		
		$player = $event->getPlayer();
		
		if (!$player->isOp()) {
			$event->setLine(0, TextFormat::clean($event->getLine(0)));
			$event->setLine(1, TextFormat::clean($event->getLine(1)));
			$event->setLine(2, TextFormat::clean($event->getLine(2)));
			$event->setLine(3, TextFormat::clean($event->getLine(3)));
		}
	}
}

?>