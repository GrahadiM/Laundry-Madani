<?php

namespace App\Helper;

class SettingHelper
{
    public static function getSetting()
    {
        $settings = \App\Models\SettingWebsite::get()->first();
        return $settings;
    }

    public static function getCode()
    {
        $code = \App\Models\Transaction::where('customer_id', Auth()->user()->id)->where('status', 'Proses')->where('tgl_penerimaan', '=', NULL)->latest('id')->get()->first();
        return $code;
    }

}
