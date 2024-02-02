<?php
use Bitrix\Main\Config\Option;
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$module_id = "moduleoptions";

$tabs = [
    [
        "DIV" => "settings",
        "TAB" => Loc::getMessage('MODULEOPTIONS_OPTIONS_TAB'),
        "TITLE" => Loc::getMessage('MODULEOPTIONS_OPTIONS_TITLE'),
    ],
];

$tabControl = new CAdminTabControl("tabControl", $tabs);
$request = Application::getInstance()->getContext()->getRequest();

if (($request->isPost()) && check_bitrix_sessid()) {
    foreach ($_POST as $key => $value) {
        Option::set($module_id, $key, $value);
    }
}

$tabControl->Begin();
?>

<form method="post" action="<?=$APPLICATION->GetCurPage()?>?mid=<?=htmlspecialcharsbx($module_id)?>&amp;lang=<?=LANGUAGE_ID?>">
    <?=bitrix_sessid_post();?>

    <?$tabControl->BeginNextTab();?>
    <tr>
        <td><?=Loc::getMessage('MODULEOPTIONS_OPTIONS_PHONE')?></td>
        <td><input type="text" name="phone" value="<?=Option::get($module_id, 'phone')?>"></td>
    </tr>
    <tr>
        <td><?=Loc::getMessage('MODULEOPTIONS_OPTIONS_WA')?></td>
        <td><input type="text" name="whatsapp" value="<?=Option::get($module_id, 'whatsapp')?>"></td>
    </tr>
    <tr>
        <td><?=Loc::getMessage('MODULEOPTIONS_OPTIONS_TG')?></td>
        <td><input type="text" name="telegram" value="<?=Option::get($module_id, 'telegram')?>"></td>
    </tr>
    <tr>
        <td><?=Loc::getMessage('MODULEOPTIONS_OPTIONS_EMAIL')?></td>
        <td><input type="text" name="email" value="<?=Option::get($module_id, 'email')?>"></td>
    </tr>

    <?$tabControl->Buttons();?>
    <input type="submit" name="apply" value="Применить" class="adm-btn-save">
</form>

<?$tabControl->End();?>
