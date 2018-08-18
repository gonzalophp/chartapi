image=chartapi
container=chartapi
port=-p 80:80

build:
	docker build -t $(image) -f docker/Dockerfile .

stop:
	docker stop $(container) ||:
	docker wait $(container) ||:

remove: stop
	docker rm $(container) ||:

start:
	docker start $(container)

run: remove
	docker run -d -t $(port) --name $(container) $(image) bash

run-dev: remove
	docker run -d -t $(port) \
	--volume `pwd`:/home/sites/chartapi \
	--name $(container) $(image) bash

exec:
	docker exec -it $(container) bash

vendor-refresh:
	docker cp composer.json $(container):/home/sites/chartapi
	docker exec $(container) rm -Rf vendor composer.lock
	docker exec $(container) composer install
	rm -Rf vendor composer.json
	docker cp $(container):/home/sites/chartapi/composer.json .
	docker cp $(container):/home/sites/chartapi/vendor .
