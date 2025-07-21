# Milk Distribution Yii

Веб-приложение для учёта и распределения молока, построенное на Yii2 Framework.

## Быстрый старт (через Docker)

1. **Клонируйте репозиторий:**
   ```sh
   git clone <repo-url>
   cd milk-distribution-yii
   ```

2. **Создайте файл .env:**
   Создайте в корне проекта файл с именем `.env` и добавьте в него следующие переменные:
   ```
    MYSQL_DATABASE=yii2basic
    MYSQL_ROOT_PASSWORD=admin
    MYSQL_USER=yii_user
    MYSQL_PASSWORD=yii_pass
   ```


3. **Запустите проект:**
   Эта команда соберёт и запустит контейнеры приложения и базы данных в фоновом режиме.
   ```sh
   docker-compose up -d
   ```

4. **Выполните миграции:**
   Эта команда создаст все необходимые таблицы в базе данных.
   ```sh
   docker-compose exec app php yii migrate --interactive=0
   ```

5. **Откройте в браузере:**
   - [http://localhost:8080/](http://localhost:8080/)

---

### Управление зависимостями

**Composer-зависимости (PHP)** устанавливаются автоматически при сборке Docker-образа. Если вы изменили `composer.json`, пересоберите образ с помощью команды:
```sh
docker-compose build
```

