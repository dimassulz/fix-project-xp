help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  reaload-nginx                  Restart Nginx web server"
	@echo "  it-php                         Interactive mode on php image"
	@echo "  install              			Install project project from composer"
	@echo "  update                			Update project project from composer"
	@echo "  migrate                		Run migrations project from phinx"
	@echo "  seeder                			Run seeds project from phinx"

reload-nginx:
	@docker exec assessment-backend-xp nginx -s reload

it-php:
	@docker exec -it php8 /bin/bash

install:
	@docker-compose exec php8 composer install -d /var/www/assessment-backend-xp
	@vendor/bin/phinx migrate -e development
	@vendor/bin/phinx migrate -e development

update:
	@docker-compose exec php8 composer update -d /var/www/assessment-backend-xp

migrate:
	@vendor/bin/phinx migrate -e development  

seeder:
	@vendor/bin/phinx seed:run -s ProductSeeder -s CategorySeeder -s ProductCategoryMappingSeeder