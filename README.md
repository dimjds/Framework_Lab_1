# 1. Какие есть преимущества использования фреймворка Symfony?

Производительность: Symfony является высокопроизводительным фреймворком, который может обрабатывать большое количество запросов.
Безопасность: Symfony включает в себя ряд функций безопасности, которые помогают защитить ваш веб-сайт от атак.
Модульность: Symfony основан на модульной архитектуре, что делает его легко расширяемым и настраиваемым.
Документация: Symfony имеет обширную документацию, которая поможет вам начать работу и решить любые проблемы.
Сообщество: Symfony имеет активное сообщество, которое предлагает поддержку и советы.

# 2. Какие есть способы определения маршртутов в Symfony?

Файл маршрутов: Маршруты можно определить в файле маршрутов, который называется routes.yaml. Этот файл находится в каталоге config вашего приложения.
Контроллер: Маршруты можно определить в контроллере. Это позволяет вам более гибко определять маршруты, а также позволяет вам использовать методы контроллера для обработки запросов.


# 3. Какая связь между таблицами баз данных была использована и как именно это было реализовано?

OneToOne: Связь один ко одному означает, что каждая запись в одной таблице связана с одной записью в другой таблице.
OneToMany: Связь один ко многим означает, что каждая запись в одной таблице может быть связана с несколькими записями в другой таблице.
ManyToOne: Связь многие ко одному означает, что несколько записей в одной таблице могут быть связаны с одной записью в другой таблице.
ManyToMany: Связь многие ко многим означает, что несколько записей в одной таблице могут быть связаны с несколькими записями в другой таблице.

# 4. Что такое миграции базы данных, и как они применяются в Symfony?

Миграции базы данных - это способ автоматического управления изменениями в схеме базы данных. Symfony включает в себя встроенную систему миграций, которая позволяет вам создавать, применять и откат миграции.

Чтобы использовать миграции в Symfony, вы должны создать класс миграции. Этот класс должен содержать метод up(), который выполняет изменения в схеме базы данных, и метод down(), который отменяет изменения.

Для создания миграции вы можете использовать команду php bin/console make:migration. Эта команда создаст новый файл миграции в каталоге migrations вашего приложения.

Чтобы применить миграцию, вы можете использовать команду php bin/console doctrine:migrations:migrate. Эта команда применит все миграции, которые не были применены ранее.

Чтобы отменить миграцию, вы можете использовать команду php bin/console doctrine:migrations:rollback. Эта команда отменяет последнюю миграцию
