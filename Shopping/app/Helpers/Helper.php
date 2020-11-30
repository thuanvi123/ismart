<?php
function getConfigValueSettingTable($configKey){
    $settings=\App\FrontendSettingModel::where('config_key',$configKey)->first();
    if (!empty($settings)){
        return $settings->config_value;
    }
    return null;

}