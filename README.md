# Сайт с блогами о городах

==================================================================

## Пользователь по умолчанию:

`
Login: admin
Password: admin1234
`


## Запуск проекта:

|---------------------------|
|1| `make init`             |
|2| `make start`            |
|3| `make migrate up`       |

### Команды Make

| Команда                 | Описание                                                        |
|-------------------------|-----------------------------------------------------------------|
| `make init`             | Полная установка проекта с нуля                                 |
| `make start`            | Запускает Docker-контейнеры                                     |
| `make end`              | Удаляет Docker-контейнеры                                       |
| `make migrate up`       | Применение миграции                                             |
| `make migrate down`     | Отмена миграции                                                 |


##  IMPORTANT


If you want change session timeout with choiced city you should change value at frontend/ReviewController session['city']['timelife']
(Default it is for 10 sec)



