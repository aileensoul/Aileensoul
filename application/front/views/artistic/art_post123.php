<?php

function make_links($text, $class='', $target='_blank'){ 
    return preg_replace('!((http\:\/\/|ftp\:\/\/|https\:\/\/)|www\.)([-a-zA-Zа-яА-Я0-9\~\!\@\#\$\%\^\&\*\(\)_\-\=\+\\\/\?\.\:\;\'\,]*)?!ism', 
    '<a class="'.$class.'" href="//$1$3" target="'.$target.'">$1$3</a>', 
    $text);
}

// $content =" i am a employer of aileensoul and my company website is www.aileensoul.com please must be visit. and send your feedback. Thanks";
 $content ="I am a employer of aileensoul and my company website is  www.aileensoul.com please must be visit. and send your feedback. Thanks";

echo  make_links($content); 
 // echo  $content;

?>