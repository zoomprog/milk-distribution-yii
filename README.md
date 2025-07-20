# Milk Distribution Yii

Веб-приложение для учёта и распределения молока, построенное на Yii2 Framework.

## Быстрый старт (через Docker)

1. **Клонируйте репозиторий:**
   ```sh
   git clone <repo-url>
   cd milk-distribution-yii
   ```

2. **Создайте файл .env:**
   ```sh
    MYSQL_ROOT_PASSWORD=admin
    MYSQL_DATABASE=yii2basic
    MYSQL_USER=root
    MYSQL_PASSWORD=admin
   ```

3. **Настройте переменные окружения (опционально):**
   - По умолчанию используется база данных `yii2basic` с пользователем `root` и паролем `admin`.
   - Порт MySQL по умолчанию: 3307 (можно изменить в `docker-compose.yml`).

4. **Запустите проект:**
   ```sh
   docker-compose up -d
   ```

5. **Выполните миграции:**
   ```sh
   docker-compose exec app php yii migrate --interactive=0
   ```

6. **Откройте в браузере:**
   - [http://localhost:8080/](http://localhost:8080/)


**Для локальной разработки без Docker потребуется PHP >= 8.2, Composer, MySQL.**
