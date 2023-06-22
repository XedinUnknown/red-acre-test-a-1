MODULE_DIRS := $(wildcard modules/**)
.PHONY: all \
		build \
		build-frontend \
		install \
		install-js

all: build

build: install
	$(MAKE) build-frontend

build-frontend:
	yarn build

install:
	$(MAKE) install-js

install-js:
	yarn install

