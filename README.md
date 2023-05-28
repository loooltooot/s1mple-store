# Развертывание

### 1. Запустить Docker

### 2. Скопировать репозиторий GitHub
```console
git clone https://github.com/loooltooot/s1mple-store
cd s1mple-store
```
### 3. Установить зависимоcти composer
```console
composer i
```
### 4. Создать контейнер через Laravel Sail
```console
./vendor/bin/sail up -d
```
### 5. Дождаться выполнения команд в laravel.test и перезапустить этот контейнер
### 6. Открыть http://127.0.0.1/ в браузере