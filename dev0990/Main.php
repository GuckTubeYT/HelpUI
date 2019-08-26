<?php

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
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("§aHelpUI by dev0990 enabled!"); // Message on enable
    }

    public function onDisable()
    {
        $this->getLogger()->info("§cHelpUI by dev0990 disabled!"); // Message on disable
    }

    public function onLoad()
    {
        $this->getLogger()->info("§7Loading HelpUI by dev0990..."); // Message on load
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool
    {
        switch ($cmd->getName()) {
            case "helpui":
                if (!$sender instanceof Player) {
                    $sender->sendMessage("Use this command in game"); // Vllt soon in Config
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
        $form = new SimpleForm(function (Player $player, $data) { // Create UI
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