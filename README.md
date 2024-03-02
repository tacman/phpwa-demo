# Symfony + PWA = 💕

## Introduction

This application is a PWA (Progressive Web Application) built with Symfony and PHPWA.

## Getting Started (Docker)

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d --wait` to start the project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## Getting Started

Install Symfony CLI and PostgreSQL

composer require spomky-labs/phpwa

bin/console d:d:c

## License

It is available under the MIT License.
