.PHONY: all \
		build \
		install \
		install-php

include .env

all:
	make build

build:
	make install

install:
	make install-php

install-php:
	composer install
