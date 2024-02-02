<?php
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\GroupTable;
use Bitrix\Main\Application;
use Bitrix\Main\SystemException;
use Bitrix\Main\AccessDeniedException;
use Bitrix\Main\EventManager;

Loc::loadMessages(__FILE__);
Loader::includeModule('main');

if (class_exists('moduleoptions')) {
    return;
}

Class moduleoptions extends CModule {
    public $MODULE_ID = 'moduleoptions';
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;

    public function __construct() {
        if (file_exists(__DIR__ . '/version.php')) {
            $arModuleVersion = array();
            
            include __DIR__ . '/version.php';
            
            $this->MODULE_NAME = Loc::getMessage('MODULEOPTIONS_MODULE_NAME');
            $this->MODULE_DESCRIPTION = Loc::getMessage('MODULEOPTIONS_MODULE_DESCRIPTION');
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
            $this->PARTNER_NAME = Loc::getMessage('MODULEOPTIONS_PARTNER_NAME');
            $this->PARTNER_URI = Loc::getMessage('MODULEOPTIONS_PARTNER_URI');
        }
    }

    public function DoInstall() {
        ModuleManager::registerModule($this->MODULE_ID);
    }

    public function DoUninstall() {
        ModuleManager::unregisterModule($this->MODULE_ID);
    }
}
