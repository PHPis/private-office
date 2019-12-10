# Тестовое задание

## Задание
- [x] выдача всех организаций находящихся в конкретном здании
- [x] список всех организаций, которые относятся к указанной рубрике
- [x] список организаций, которые находятся в заданном радиусе/прямоугольной области относительно указанной точки на карте.
- [x] список зданий
- [x] выдача информации об организациях по их идентификаторам
- [x] дерево рубрик каталога со всеми предками, с возможностью фильтрации по потомкам конкретного узла
- [x] поиск организации по названию
- [ ] рубрикатор каталога сделать с произвольным уровнем вложенности рубрик друг в друга

## Список роутов
- /companies/{building}/building
Выдача всех организаций находящихся в конкретном здании, где: {building} - id здания
- /companies/{rubric}/rubric
Список всех организаций, которые относятся к указанной рубрике, где: {rubric} - id рубрики
- /companies/{x}/{y}/{radius}/radius
Список организаций, которые находятся в заданном радиусе/прямоугольной области относительно указанной точки на карте. Где:
{x} и {y} центр окружности, расстояние от которой будет вычисляться, а {radius} - радиус, максимальное расстояние до здания
Формат ответа на запрос /companies/500/500/500/radius:
```
[
    {
        "id": 32,
        "name": "company-1",
        "phone": [
            4271,
            3254
        ]
    },
    {
        "id": 48,
        "name": "company-17",
        "phone": [
            7788,
            1866
        ]
    }
]
```
- /rubric
Дерево рубрик каталога со всеми предками, с возможностью фильтрации по потомкам конкретного узла
```
[
    {
        "id": 1,
        "name": "rubric-0",
        "children": [
            {
                "id": 2,
                "name": "rubric--0",
                "children": []
            },
            {
                "id": 3,
                "name": "rubric--1",
                "children": []
            }
        ]
    },
]
```
### Опубликовано
https://rocky-reef-71461.herokuapp.com
На данном ресурсе были изменены некоторые настройки, но основные файлы функционала не тронуты.

### Дамп
Для добавления таблиц в БД требуется выполнить:
```
php bin/console d:s:u
```
Для загрузки данных можно воспользоваться фикстурами:
```
php bin/console doctrine:fixtures:load
```
Или воспользоваться дампом наполнения из файла app_building.sql.
