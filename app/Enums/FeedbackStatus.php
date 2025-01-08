<?php

namespace App\Enums;

enum FeedbackStatus: string
{
    case NEW = 'new';
    case INPROCESSING = 'in_processing';
    case COMPLETED = 'completed';
}
