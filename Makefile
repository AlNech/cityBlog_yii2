#init project
init:
	docker-compose run --rm frontend composer install
	docker-compose run --rm frontend php /app/init
start:
	docker-compose up -d
end:
	docker-compose down
migrate up:
	docker-compose run --rm frontend yii migrate
migrate down:
	docker-compose run --rm frontend yii migrate/down

