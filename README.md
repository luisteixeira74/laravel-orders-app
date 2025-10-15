# laravel-orders-app

## Requisitos

- Docker
- Docker Compose

## Como rodar

1. Copie `.env.example` para `src/.env` e gere a APP_KEY:

```bash
cp .env.example src/.env
# depois rode (dentro do container app ou usando composer locally):
# docker compose run --rm app php artisan key:generate
```

Suba os containers:

docker compose up -d --build

Instale dependências (se necessário) e gere a key:

docker compose exec app composer install
docker compose exec app php artisan key:generate

Rode migrations:

docker compose exec app php artisan migrate

Acesse http://localhost:8080
