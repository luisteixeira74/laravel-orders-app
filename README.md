# Laravel Orders App

Aplicação Laravel para gerenciamento de pedidos, com autenticação, dashboard e CRUD de pedidos.  
O projeto roda via Docker, usando PostgreSQL e Redis.

---

## Pré-requisitos

- Docker
- Docker Compose
- Node.js e NPM (para compilar assets Tailwind, caso necessário)

---

## Configuração inicial

Todos os comandos a seguir devem ser executados **dentro da pasta `src/`**, onde estão os arquivos do Laravel.

1. **Copiar o `.env.example` para `.env`**:

```bash
cp .env.example .env
```

2. **Construir e subir os containers do Docker (executar da raiz do projeto, onde está o docker-compose.yml)**:

```bash
docker-compose up -d --build
```

3. **Rodar migrations e seeders (dentro do container laravel-app)**:

```bash
docker exec -it laravel-app bash
php artisan migrate --seed
exit
```

4. **Acessando a aplicação:**:

- Frontend via Nginx: http://localhost:8080

5. **Rodar testes (dentro do container laravel-app)**:

```bash
docker exec -it laravel-app bash
php artisan test
exit
```
