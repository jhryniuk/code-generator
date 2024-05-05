.PHONY: build up down worker

build:
	@echo 'Build docker compose environment'
	docker compose build

up:
	@echo 'Start docker compose'
	docker compose up -d

worker:
	@echo 'Start the worker that consumes queue'
	docker compose exec -T worker-php /var/www/html/bin/console messenger:consume async

down:
	@echo 'Stop docker compose'
	docker compose down

react:
	@echo 'Start docker compose react'
	docker compose exec client generate-api-platform-client --resource book