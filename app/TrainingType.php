<?php

namespace App\Enums;

enum TrainingType: string
{
    case CorporateWorkshop    = 'Corporate AI Workshop';
    case SchoolLiteracy       = 'School AI Literacy Training';
    case OneOnOneCoaching     = '1-on-1 AI Coaching';
    case CustomConsulting     = 'Custom AI Consulting';
}