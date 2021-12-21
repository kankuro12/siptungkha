<?php

use App\Models\PageConfig;

function custom_config($id){
    return PageConfig::where('identifire',$id)->first();
}
