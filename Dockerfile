FROM yiisoftware/yii2-php:8.3-apache

# Установка дополнительных пакетов (опционально)
# RUN apt-get update && apt-get install -y nano vim less

# Копируем composer.lock и composer.json
COPY composer.json composer.lock /app/

# Устанавливаем зависимости
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Копируем остальные файлы проекта
COPY . /app

# Даем права на runtime и assets
RUN chmod -R 0777 /app/runtime /app/web/assets

# Указываем рабочую директорию
WORKDIR /app

# Открываем порт 80 (уже открыт в базовом образе)
EXPOSE 80 