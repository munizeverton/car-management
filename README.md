![Testes](https://github.com/munizeverton/car-management/actions/workflows/tests.yml/badge.svg)

## Car Management

Projeto de uma API de gerenciamento de carros, feito com Laravel 10 e MySQL.

- [Documentação da API](https://www.postman.com/universal-robot-168801/workspace/car-management/overview).

## Instalação e configuração

Faça um clone desse repositório

```bash
git clone https://github.com/munizeverton/car-management
```

Crie um arquivo chamado .env a partir do arquivo .env.example e altere as configurações abaixo, referentes ao banco da aplicação

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=car_management
DB_USERNAME=root
DB_PASSWORD=
```

Instale as dependências do projeto

```bash
composer install
```

Rode as migrations para criar as tabelas do banco de dados

```bash
php artisan migrate
```

## Rodando a aplicação

Você pode rodar a aplicação usando o comando artisan abaixo

```bash
php artisan serve
```

Agora, basta acessar a aplicação em http://localhost:8000

## Rodando os testes

Para rodar os testes, basta executar o comando abaixo

```bash
php artisan test
```
