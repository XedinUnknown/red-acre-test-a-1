MODULE_DIRS := $(wildcard modules/* )
.PHONY: all \
		build \
		install \
		install-php \
		test \
		test-php \
		$(MODULE_DIRS)

include .env

all: build

build: install
	$(MAKE) build-modules
	wait

build-modules: $(MODULE_DIRS)

$(MODULE_DIRS):
	@if [ -f "$@/Makefile" ]; then echo "$@/Makefile exists!"; $(MAKE) -C $@ build; fi

install:
	$(MAKE) install-php

install-php: composer.lock
	composer install

test:
	$(MAKE) test-php

test-php:
	vendor/bin/phpunit
