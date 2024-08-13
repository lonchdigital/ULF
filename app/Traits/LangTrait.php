<?php
namespace app\Traits;

trait LangTrait {

    public function getAvailableLanguages(): array
    {
        return ['ua', 'ru'];
    }

}
