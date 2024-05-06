.PHONY: build up down worker worker-down build-db

build:
	@echo 'Build docker compose environment'
	docker compose build

up:
	@echo 'Start docker compose'
	docker compose up -d db rabbit api-php nginx client

build-db:
	@echo 'Set up database'
	docker compose exec -T api-php /var/www/html/bin/console doc:mig:mig -q

worker:
	@echo 'Start worker'
	docker compose up -d worker-php

worker-down:
	@echo 'Stop worker'
	docker compose down worker-php
down:
	@echo 'Stop docker compose'
	docker compose down
