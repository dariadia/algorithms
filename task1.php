<?php
echo 'задание 1' . "</br>";

$dir = 'img';


// 1, покажет все файлы и каталоги в директории минус файлы ".." и "." и "._"

foreach (new DirectoryIterator($dir) as $file) {
    if ($file->isDot()) continue;
    echo $file->getFilename() . "<br>\n";
}


echo '2 вариант' . "</br>";
$rdir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), TRUE);

foreach ($rdir as $file) {
    echo str_repeat('---', $rdir->getDepth()) . $file . '<br>';
}


echo "</br>" . 'задание 2' . "</br>";
