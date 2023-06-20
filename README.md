# Red Acre - Test A-1
[![Continuous Integration](https://github.com/xedinunknown/red-acre-test-a-1/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/xedinunknown/red-acre-test-a-1/actions/workflows/continuous-integration.yml)

A test theme for Red Acre.

## Getting Started
1. Pull the repo.
2. Copy `.env.example` to `.env`, possibly tweaking configuration. This includes access credentials.
3. Run `docker compose build` to build the containers.
4. Run `docker compose run --rm build make build` to build the project, including modules.
5. Run `docker-compose up wp_dev` to bring up the local WordPress environment.

## Notes
Created from [wp-oop/plugin-boilerplate][]. 

[wp-oop/plugin-boilerplate]: https://github.com/wp-oop/plugin-boilerplate
