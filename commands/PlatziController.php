<?php

namespace app\commands;

use app\models\Book;
use yii\console\ExitCode;
use yii\console\Controller;

/**
 * Comando para clase, de prueba
 */
class PlatziController extends Controller {

    /**
     * Suma los valores de los dos parámetros
     */

    public function actionSuma($a, $b = 17)
    {
        $result = $a + $b;
        printf("%0.2f\n", $result);
        return ExitCode::OK;
    }

    public function actionBooks($file) 
    {
        $f = fopen($file, "r");
        while(!feof($f)) {
            $data = fgetcsv($f);
            if(!empty($data[1]) && !empty($data[2])) {
                $book = new Book;
                $book->title = $data[1];
                $book->author = $data[2];
                printf("%s\n", $book->toString());
            }
        }
        fclose($f);
        return ExitCode::OK;
    }
}