# maillogger

Для запуска необходимы  
PHP7.1  
Mysql (Percona)  

Вариант запуска с докера:  

/docker/env-example скопировать в /docker/.env  
править по желанию

Запуск /docker/start.sh  
Остановка /docker/stop.sh  
Консоль /docker/console.sh  

После входа в консоль выполняем  
cd protected  
composer install  

Почта не работает, письмо записывается в файл protected/runtime/mails.log

Для работы сайта необходимо скопировать  
/protected/env-example в /protected/.env  

в консоли запустить миграции  
cd protected  
php yiic migrate  

сайт доступен по ссылке http://localhost
