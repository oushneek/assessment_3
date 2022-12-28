<?php

$pattern=$_POST["pattern"];
$s=$_POST["string"];

$result = pattern_match($pattern,$s);

echo $result;

function pattern_match($pattern, $s) {

    $arr = explode(" ",$s);
    $length = strlen($pattern);
    if($length !== sizeof($arr))
        return "false";

    $check = [];
    for($i = 0; $i < $length; $i++) {
        if(isset($check[$pattern[$i]])) {
            if($check[$pattern[$i]] !== $arr[$i])
                return "false";
        } else {
            if(in_array($arr[$i], $check))
                return "false";
            $check[$pattern[$i]] = $arr[$i];
        }
    }
    return "true";
}

?>