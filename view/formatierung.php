<?php
/**
 * Created by PhpStorm.
 * User: scuib
 * Date: 26.11.2017
 * Time: 14:14
 */

function zahl_format($zahl){
    return "CHF " .number_format($zahl, 2, ".", "'");
}