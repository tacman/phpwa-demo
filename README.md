# Symfony + PWA = 💕

## Introduction

This application is a PWA (Progressive Web Application) built with Symfony and PHPWA.

## Getting Started (Docker)

### With Docker

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `make build` to build fresh images
3. Run `make frontend` to build the frontend assets
4. Run `make up` to start the project
5. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
6. Run `make down` to stop the Docker containers.

### With Symfony CLI

1. If not already done, [install Symfony CLI](https://symfony.com/download)
2. Create a `.env.local` file and set the `DATABASE_URL` environment variable
3. Run `symfony console doctrine:database:create` to create the database
4. Run `symfony console doctrine:migrations:migrate` to create the database schema
5. Run `symfony server:ca:install` to install the TLS certificate
6. Run `symfony server:start` to start the project
7. Run `symfony console tailwind:build` to build the frontend assets
8. Open `https://localhost:8000` in your favorite web browser
9. Run `symfony server:stop` to stop the server

## Getting Started

Install Symfony CLI and PostgreSQL

composer require spomky-labs/phpwa

bin/console d:d:c

## License

It is available under the MIT License.
