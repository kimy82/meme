<?php

function get_natural_month($month_number, $lang = FALSE)
{
    if(!$lang) $lang = config_item('language_abbr');

    $mesos = array(
        'es' => array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'),
        'en' => array('january','february','march','april','may','june','july','august','september','october','november','december')
    );
    
    return $mesos[$lang][$month_number - 1];
}
