all:
	@echo "Opciones: crud, assets, cache"

	@echo "Generar entidades: php app/console doctrine:generate:entities Acme/UserBundle/Entity/User"

assets:
	sudo chown $(shell whoami):www-data web/bundles -R
	sudo chmod ug+rw  app/cache web/bundles -R
	sudo su www-data -c "php app/console assets:install ./web --symlink"


cache:
	make permisos
	rm app/cache -R
	sudo su www-data -c "php app/console cache:clear"
	make permisos

permisos:
	sudo chown $(shell whoami):www-data app/cache -R
	sudo chown $(shell whoami):www-data app/logs -R
	sudo chmod g+rw app/cache -R
	sudo chmod g+rw app/logs/ -R


db:
	
	make cache
	php app/console doctrine:schema:drop --force
	php app/console doctrine:schema:create
	php app/console doctrine:fixtures:load --no-interaction
	make cache

