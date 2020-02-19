# Задание: Написать web приложение "Библиотека"

![](https://i.imgur.com/gTGZIpj.gif)

Оно должно содержать три страницы:
* список книг
* добавление книги
* редактирование книги

По каждой книге нужно хранить и отображать информацию:
* имя
* год
* автор

В файле README.md написать как поднять и настроить приложение
Решение выложить на github

Требования:
* Symfony 4.4
* PHP >= 7.3
* Mysql

![](https://i.imgur.com/AVAcZyt.png)

### 1) Установка

Скачиваем, переходим и устанавливаем зависимости 

```sh
git clone https://github.com/DaYmiHn/library_crud
cd library_crud
composer install
```
### 2) Настройка
- В .env ндо отредактировать конфигурацию для СУБД MySQL
``` DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name```
- Создать БД
``` php bin/console doctrine:database:create ```
- И мигрировать сущность
``` php bin/console doctrine:migrations:migrate ```




### 3) Запуск
```sh
php bin/console server:run
```


