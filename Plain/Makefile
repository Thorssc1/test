PROJECT_INFRASTRUCTURE= $(PWD)/docker
PROJECT_SRC= $(PWD)/project/app

# set docker build environment based on env variable DOCKER_BUILD_ENVIRONMENT
DOCKER_COMPOSE_FILES=-f ${PROJECT_INFRASTRUCTURE}/docker-compose.yml

help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Application commands:"
	@echo "================================="
	@echo "  app-start                      Start the docker containers and update the application dependencies"
	@echo "  app-stop                       Stop the docker containers"
	@echo "  app-restart                    Execute app-stop and app-start"

docker-start:
	@docker-compose ${DOCKER_COMPOSE_FILES} up -d

docker-stop:
	@docker-compose ${DOCKER_COMPOSE_FILES} stop

docker-build:
	@docker-compose ${DOCKER_COMPOSE_FILES} build

app-composer-install:
	@echo "APP COMPONENT INITIALIZING ..."
	composer install --working-dir=${PROJECT_SRC}

docker-destroy:
	@docker-compose ${DOCKER_COMPOSE_FILES} down --remove-orphans -v

app-start: docker-start
app-stop: docker-stop
app-restart: app-stop app-start
app-build: docker-build app-composer-install app-start
app-destroy: docker-destroy
app-rebuild: app-destroy app-build
