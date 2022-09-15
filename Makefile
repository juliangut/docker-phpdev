IMAGE_NAME = juliangut/phpdev-local
XDEBUG_VERSION = `curl -s https://github.com/xdebug/xdebug/releases.atom | grep "<title>[0-9]*\.[0-9]*\.[0-9]*</title>" | awk -F '[<>]' '{ print $$3; exit }'`


.PHONY: scaffold
scaffold:
	bin/phpdev scaffold-all


.PHONY: export-build
export-build:
	bin/phpdev export-build --pretty $(XDEBUG_VERSION)


.PHONY: build-cli74
build-cli74:
	cd dist/cli/7.4 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):7.4 .

.PHONY: build-cli80
build-cli80:
	cd dist/cli/8.0 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.0 .

.PHONY: build-cli81
build-cli81:
	cd dist/cli/8.1 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.1 .

.PHONY: build-cli
build-cli:
	make --no-print-directory build-cli74 && \
	make --no-print-directory build-cli80 && \
	make --no-print-directory build-cli81


.PHONY: build-fpm74
build-fpm74:
	cd dist/fpm/7.4 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):7.4-fpm .

.PHONY: build-fpm80
build-fpm80:
	cd dist/fpm/8.0 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.0-fpm .

.PHONY: build-fpm81
build-fpm81:
	cd dist/fpm/8.1 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.1-fpm .

.PHONY: build-fpm
build-fpm:
	make --no-print-directory build-fpm74 && \
	make --no-print-directory build-fpm80 && \
	make --no-print-directory build-fpm81


.PHONY: build-jenkins74
build-jenkins74:
	cd dist/jenkins/7.4 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):7.4-jenkins .

.PHONY: build-jenkins80
build-jenkins80:
	cd dist/jenkins/8.0 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.0-jenkins .

.PHONY: build-jenkins81
build-jenkins81:
	cd dist/jenkins/8.1 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.1-jenkins .

.PHONY: build-jenkins
build-jenkins:
	make --no-print-directory build-jenkins74 && \
	make --no-print-directory build-jenkins80 && \
	make --no-print-directory build-jenkins81
