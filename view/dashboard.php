<?php
/**
 * Created by PhpStorm.
 * User: marcokunz
 * Date: 03.11.17
 * Time: 15:09.
**/

echo "dashboard";


foreach ($rechnung as $rechnungen):
    echo $rechnungen->getTyp();
endforeach;
echo "Hallo";