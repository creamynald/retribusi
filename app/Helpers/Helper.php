<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use PDF;
class Helper
{
    public static function shout($tofile)
    {
        return Pdf::loadFile($tofile)->stream();
    }
}