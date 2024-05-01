.PHONY: build up down worker

build:
	@echo 'Build docker compose environment'
	docker compose build

build-db:
	@echo 'Build database'
	docker compose exec -T api-php /var/www/html/bin/console doc:mig:mig -q

up:
	@echo 'Start docker compose'
	docker compose up -d

worker:
	@echo 'Start the worker that consumes queue'
	docker compose exec -T worker-php /var/www/html/bin/console messenger:consume async

down:
	@echo 'Stop docker compose'
	docker compose down

