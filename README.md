# petProject_FRAMEWORK

Фреймворк с минимальным функционалом для работы.

Перед началом работы нужно первым делом подтянуть `autoload` и `подключённую библиотеку`  
<br>Команды: 
- `composer install`
- `composer update`
- `composer dump-autoload`

<hr>

- В файле `Config/env.php` хранятся параметры для подключения к БД;
- В файле `Config/init.php` храняться константы с путями и автозагрузчик. Можно добавлять по надобности;
- Файл `Config/routes.php` отвечает за добавления туда новых URI-адресов;
- Класс `vendor/Core/App.php` - основной класс, который хранит в себе подключение класса `Router`, паттерн `Registry` и обработчик ошибок `ErrorHandler`;

<hr>

## Если используешь NGINX

    events {}

    http {

        include mime.types;
        
        server {
            listen 80;
            listen [::]:80;
            server_name pet_project.com;
            root /home/sites/petProject_FRAMEWORK/Public;
            
            index index.php;
        
            charset utf-8;
        
            location / {
                try_files $uri $uri/ /index.php?$query_string;
            }
        
            error_page 404 /index.php;
        
            location ~ ^/index\.php(/|$) {
                fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
                include fastcgi_params;
                fastcgi_hide_header X-Powered-By;
                
                fastcgi_pass 127.0.0.1:9000;
            }
        
            location ~ /\.(?!well-known).* {
                deny all;
            }
        }	
    }

<hr>

## Если используешь APACHE

### 1. `petProject_FRAMEWORK/.htaccess`

    RewriteEngine On
    RewriteRule (.*) Public/$1

### 2. `petProject_FRAMEWORK/Public/.htaccess`

    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    #RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule (.*) index.php?$1 [L,QSA]

    #Options -Indexes
