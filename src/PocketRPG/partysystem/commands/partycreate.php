<?php

namespace PocketRPG\partysystem\commands;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\config;
use pocketmine\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use PocketRPG\main;

class partycreate extends PluginBase {
  
  public function onCommand(CommandSender $p, Command $cmd, $label, array $args) {
    if($cmd->getName()) == "createparty") {
      $partyname = $this->$args[0];
      if(!isset($args[0])) {
        $p->sendMessage(TF:: RED . "Please specify your party name.");
      } elseif($p->hasPermission("party.joined")) {
        $p->sendMessage(TF:: RED . "You are already in a party!");
      } else {
        $p->sendMessage(TF:: AQUA . "You have started a party named $partyname!");
        $p->setPermission("party.joined");
        $p->setPermission("party." . $args[0] . "");
        $p->setNameTag($args[0] . ":".$p->getName());
      }
    }
  return $cmd;
  }
}
