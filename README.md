[![Build Status](https://travis-ci.org/drtsb/ebc-test.svg?branch=master)](https://travis-ci.org/drtsb/ebc-test)

EBC
---

Установка
---------
```
./init
```

В /common/config/mail-local.php прописать настройки БД

```
./yii migrate
```

REST API
--------
Авторизация
```
header('Authorization: Bearer ChCMc0HY1n6vB03Ca6k_68Fr08XNkOUM_1560676428'); // user1
header('Authorization: Bearer Q-ookwZwp7-jM6TvdP9SIXmViw3cxWmh_1560676444'); // user2
```

POST /split/array

```json
{
	"n": 5,
	"array": [5, 5, 1, 7, 2, 3, 5]
}
```


Console
-------

```
./yii split
```

С указанием пользователя
```
./yii split -u=1
./yii split --user=1
```

Тесты
-----
В /common/config/test-local.php прописать настройки БД

```
./yii_test migrate
```

Запуск тестов
```
./vendor/bin/codecept run
```