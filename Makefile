.PHONY: all \
		build \
		install \
		install-php \
		test \
		test-php

include .env

all: build

build: install

install:
	$(MAKE) install-php

install-php:
	composer install

test:
	$(MAKE) test-php

test-php:
	vendor/bin/phpunit
