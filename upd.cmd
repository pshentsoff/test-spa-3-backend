set php=d:\OpenServer\modules\php\PHP-7\
set PATH=%PATH%;%php%
rem php %php%\composer.phar create-project yiisoft/yii2-app-basic basic 2.0.11
php %php%\composer.phar create-project --prefer-dist --stability=stable yiisoft/yii2-app-basic basic
REM php %php%\composer.phar update vendor/*
pause