<?php
// Форкаем процесс
$pid = pcntl_fork();
if ($pid == -1) {
        // Ошибка 
        die('could not fork'.PHP_EOL);
} else if ($pid) {
        // Родительский процесс, убиваем
        die('die parent process'.PHP_EOL);
} else {
        // Отцепляемся от терминала
        posix_setsid();
        // Новый процесс, запускаем главный цикл
        while(true) {
               
        }
}