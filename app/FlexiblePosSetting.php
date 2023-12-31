<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FlexiblePosSetting extends AppModel
{
    protected $fillable = ['language', 'logo_path', 'fevicon_path', 'company_name', 'company_address', 'starting_balance', 'currency_code'];

    public $status = false;

    public function saveSettings($inputData)
    {
        $this->language = $inputData['language'];
        if (!empty($inputData['logo_path'])) {
            $this->logo_path = $inputData['logo_path'];
        }
        if (!empty($inputData['fevicon_path'])) {
            $this->fevicon_path = $inputData['fevicon_path'];
        }
        $this->company_name = $inputData['company_name'];
        $this->company_address = $inputData['company_address'];
        $this->starting_balance = $inputData['starting_balance'];
        $this->currency_code = $inputData['currency_code'];
        unset($inputData['_method']);
        setting()->set($inputData);
        setting()->save();
        setting()->forgetAll();
        if ($this->save()) {
            Session::put('fsetting', $this);
            $this->status = true;
        }
    }

    public function setting($key, $default)
    {
        $result = null;
        if (empty(Session::get('fsetting'))) {
            $setting = $this->first();
            Session::put('fsetting', $setting);
        }
        $setting = Session::get('fsetting');
        if ($key == 'language' && empty($setting->$key)) {
            return App::getLocale();
        }
        if (!empty($setting)) {
            $result = $setting->$key;
        }
        return $result;
    }
}
