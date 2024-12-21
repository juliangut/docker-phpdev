IMAGE_NAME = juliangut/phpdev-local
XDEBUG_VERSION = `curl -s https://github.com/xdebug/xdebug/releases.atom | grep "<id>.*/[0-9]*\.[0-9]*\.[0-9]*</id>" | sed -E "s/\s*<id>.*\/([0-9]*\.[0-9]*\.[0-9]*)<\/id>/<release>\1<\/release>/" | awk -F '[<>]' '{ print $$3; exit }'`


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

.PHONY: build-cli82
build-cli82:
	cd dist/cli/8.2 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.2 .

.PHONY: build-cli83
build-cli83:
	cd dist/cli/8.3 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.3 .

.PHONY: build-cli84
build-cli84:
	cd dist/cli/8.4 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.4 .

.PHONY: build-cli
build-cli:
	make --no-print-directory build-cli74 && \
	make --no-print-directory build-cli80 && \
	make --no-print-directory build-cli81 && \
	make --no-print-directory build-cli82 && \
	make --no-print-directory build-cli83 && \
	make --no-print-directory build-cli84


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

.PHONY: build-fpm82
build-fpm82:
	cd dist/fpm/8.2 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.2-fpm .

.PHONY: build-fpm83
build-fpm83:
	cd dist/fpm/8.3 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.3-fpm .

.PHONY: build-fpm84
build-fpm84:
	cd dist/fpm/8.4 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.4-fpm .

.PHONY: build-fpm
build-fpm:
	make --no-print-directory build-fpm74 && \
	make --no-print-directory build-fpm80 && \
	make --no-print-directory build-fpm81 && \
	make --no-print-directory build-fpm82 && \
	make --no-print-directory build-fpm83 && \
	make --no-print-directory build-fpm84


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

.PHONY: build-jenkins82
build-jenkins82:
	cd dist/jenkins/8.2 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.2-jenkins .

.PHONY: build-jenkins83
build-jenkins83:
	cd dist/jenkins/8.3 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.3-jenkins .

.PHONY: build-jenkins84
build-jenkins84:
	cd dist/jenkins/8.4 && \
	docker build --pull -f Dockerfile --build-arg XDEBUG_VERSION=$(XDEBUG_VERSION) -t $(IMAGE_NAME):8.4-jenkins .

.PHONY: build-jenkins
build-jenkins:
	make --no-print-directory build-jenkins74 && \
	make --no-print-directory build-jenkins80 && \
	make --no-print-directory build-jenkins81 && \
	make --no-print-directory build-jenkins82 && \
	make --no-print-directory build-jenkins83 && \
	make --no-print-directory build-jenkins84


.PHONY: lint-php
lint-php:
	vendor/bin/phplint --configuration=.phplint.yml --ansi

.PHONY: lint-ecs
lint-ecs:
	vendor/bin/ecs check --verbose --ansi

.PHONY: lint
lint:
	make --no-print-directory lint-php && \
	make --no-print-directory lint-ecs


.PHONY: fix-ecs
fix-ecs:
	vendor/bin/ecs check --fix --verbose --ansi

.PHONY: fix
fix:
	make --no-print-directory fix-ecs


.PHONY: qa-phpmd
qa-phpmd:
	vendor/bin/phpmd src ansi unusedcode,naming,design,controversial,codesize

.PHONY: qa-phpmnd
qa-phpmnd:
	vendor/bin/phpmnd --ansi src

.PHONY: qa-compatibility
qa-compatibility:
	vendor/bin/phpcs --standard=PHPCompatibility --runtime-set testVersion 8.2- src

.PHONY: qa-phpstan
qa-phpstan:
	vendor/bin/phpstan analyse --memory-limit=2G --no-progress

.PHONY: qa
qa:
	make --no-print-directory qa-phpmd && \
	make --no-print-directory qa-phpmnd && \
	make --no-print-directory qa-compatibility && \
	make --no-print-directory qa-phpstan
