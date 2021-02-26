<?php
$dir  = '../html/';
$files = scandir($dir);
$count=count($files); // Кол-во файлов два первых занимают выходы из директории
echo '<span class="alert-success"> Найдено '. ($count-2) .' файлов!</span><br>';
if(!empty($_GET['word']))
{
    $word= preg_replace ( "'<script[^>]*?>.*?'si", "",  $_GET['word']); // Убирает все скрипты
    for($i=2; $i<$count;$i++)
    {
        $fileText=file_get_contents($dir.$files[$i]);
        $fileText=preg_replace('/'.$word.'/', '<mark style="background-color: red;">'.$word.'</mark>',$fileText);
        $textLenght=strlen($fileText); // длина строки
        preg_match_all('/'.$word.'/', $fileText, $wordArray, PREG_OFFSET_CAPTURE);
        echo '<p class="text-black-50"> В файле '. $files[$i] . ' найдено '.count($wordArray[0]) .' cовпадений слова <span class="alert-success">'.$word.'</span></p>
	<h3>Найденные фрагменты:</h3>';
		
        foreach ($wordArray[0] as $curWord)
        {
            $subString =substr($fileText,0, $curWord[1]-36);
            $startString=strrpos($subString, '>')+1;
            $endString=strpos($fileText,'<', $curWord[1]+strlen($word)+1);
            echo '...'. substr($fileText,$startString,$endString-$startString). '...<br>';
        }
    }
}
