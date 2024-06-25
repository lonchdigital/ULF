<?php

namespace App\Services\Application;

use App\Services\Base\BaseService;

class ApplicationConfigService extends BaseService
{
    /**
     * always return default value
     */
    const AVAILABLE_LANGUAGES_CONFIG = 'AVAILABLE_LANGUAGES';
    const ROBOTS_TXT_CONFIG = 'ROBOTS_TXT';
    const APPLICATION_IMAGES_FOLDER = 'application-images';

    public function getAvailableLanguages(): array
    {
        return ['uk', 'ru'];
    }

}
