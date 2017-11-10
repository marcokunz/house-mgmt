<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 03.11.17
 * Time: 15:09.
**/


global $rechnung;


foreach ($rechnung as $rechnungen):
    echo $rechnungen->getTyp();
endforeach;

