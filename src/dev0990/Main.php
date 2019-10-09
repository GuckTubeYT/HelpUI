<?php

# (c) 2019 WaxierBand5235 / dev0990
# Do not be surprised WaxierBand5235 is my Minecraft account, dev0990 is my coding account
# This plugin may NOT be recoded or published as own!!!
# YouTube videos with download links are very welcome :D

namespace dev0990;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;

use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;

class Main extends PluginBase implements Listener
{
    public function onEnable()
    {
        $this->FormAPI = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(!$this->FormAPI or $this->FormAPI->isDisabled()){
        $this->getLogger()->warning("§cPlugin FormAPI not found, disabling HelpUI by dev0990...");
        $this->getLOgger()->warning("§ePlease install FormAPI.");
        }
        $this->getLogger()->info("§aHelpUI by dev0990 enabled!");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDisable()
    {
        $this->getLogger()->info("§cHelpUI by dev0990 disabled!");
    }

    public function onLoad()
    {
        $this->getLogger()->info("§7Loading HelpUI by dev0990...");
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        switch ($cmd->getName()) {
            case "helpui":
                if (!$sender instanceof Player) {
                    $sender->sendMessage($this->getConfig()->get("Console-Run-Message"));
                    return false;
                }
                if ($sender instanceof Player) {
                    $this->mainFrom($sender);
                }
                break;
        }
        return true;
    }

    public function mainFrom($sender)
    {
        $form = new SimpleForm(function (Player $player, $data) {
            $result = $data;
            if ($result === null) {
                return true;
            }
            switch ($result) {
                case 0:
                    break;
            }
        });
        $form->setTitle($this->getConfig()->get("Title"));
        $form->setContent($this->getConfig()->get("Text"));
        $form->addButton($this->getConfig()->get("Button"));
        $form->sendToPlayer($sender);
        return $form;
    }
}
