#init project
up:
	docker-compose run --rm frontend composer install
	docker-compose run --rm frontend php /app/init
start:
	docker-compose up -d
migration:
	docker-compose run --rm frontend yii migrate
end:
	docker-compose down
