include .env.example

docker_dir=docker
UID = $(shell id -u)
php_container=docker exec -it -u $(UID) vv_php

install:
	@cp .env.example .env
	@cd $(docker_dir) && docker-compose up -d
	@$(php_container) composer i
	@$(php_container) php artisan key:generate
	@chmod 777 -R ./storage && chmod 777 -R ./bootstrap/cache
	@cd $(docker_dir) && docker-compose exec -T db mysql -u"$(DB_USERNAME)" -p"$(DB_PASSWORD)" -e "create database $(DB_DATABASE);"
	@$(php_container) php artisan migrate

php:
	@$(php_container) bash
