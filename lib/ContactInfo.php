<?php

namespace Moduleoptions;

use Bitrix\Main\Config\Option;

class ContactInfo {
    public static function getPhone() {
        return Option::get("moduleoptions", "phone");
    }

    public static function getWhatsApp() {
        return Option::get("moduleoptions", "whatsapp");
    }

    public static function getTelegram() {
        return Option::get("moduleoptions", "telegram");
    }

    public static function getEmail() {
        return Option::get("moduleoptions", "email");
    }
}
