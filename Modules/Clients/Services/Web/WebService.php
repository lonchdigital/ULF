<?php

namespace Modules\Clients\Services\Web;

use Modules\Clients\Models\Client;

class WebService
{
    public function getAllClientHistories()
    {
        return Client::all();
    }
}
