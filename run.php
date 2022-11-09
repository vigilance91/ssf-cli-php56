<?php
///
///@file
///@created 
///@copyright Tyler R. Drury (vigilance.eth), All Rights Reserved
///@date 
///@brief automatically generatted wrapper to execute PHAR without making phars executable
///@note making PHAR directly executable requires additional configuration of web server or local environment, so use automated build/run.php instead!
///
use \Exception as Ex;
//always require the compressed archive first, otherwise, default to normal phar if it exists
//use \vs\module\safeCall as _call;
//
//use \vs\io\File as _f;
//
die(call_user_func(function(){
    $ret = 0;
    $dn = dirname(__FILE__);
    //
    try{
        $fn = "$dn/ssf_cli.phar.gz";
        //
        //if(_f::exists($fn)){
        if(file_exists($fn)){
            require_once "phar://$fn/main.php";
        }
        else{
            $fn = "$dn/ssf_cli.phar";
            //
            //if(_f::exist($fn)){
            if(file_exists($fn)){
                require_once "phar://$fn/main.php";
            }
            else{
                throw new Ex(__FILE__ . ", archive does not exist @ '$fn'");
            }
        }
    }
    catch(Ex $e){
        echo $e->getMessage();
        $ret = -1;
    }
    //
    return $ret;
}));
?>