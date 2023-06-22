# Red Acre - Test A-1
[![Continuous Integration](https://github.com/xedinunknown/red-acre-test-a-1/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/xedinunknown/red-acre-test-a-1/actions/workflows/continuous-integration.yml)

A test theme for Red Acre.

## Getting Started
1. Pull the repo.
2. Copy `.env.example` to `.env`, noting and possibly tweaking configuration. This includes access credentials.
3. Run `docker compose build` to build the containers.
4. Run `docker compose run --rm build make build` to build the project, including modules.
5. Consider adding the hostname from config into the `hosts` file, to serve the site via its domain.
6. Run `docker-compose up wp_dev` to bring up the local WordPress environment.

## Details
- This is a block theme, meaning that it is made entirely of Gutenberg blocks. 💝
  A very small amount of styles is in the stylesheet, which means that editors can change 99% of the site,
  including templates and template parts. This is much harder than just doing HTML + CSS,
  because it isn't possible to write just any HTML, and the CSS has to be manageable via the Gutenberg editor -
  otherwise, what's the point?

- It also includes an example custom block, and an automation to support it. I added it because I thought that
  a new theme for a custom design will certainly need to create its own blocks, but apparently 99% of regular things can
  be achieved with just a handful of vanilla blocks (and a lot of customization).

- There are all sorts of checks and automations here. Testing, code style, development best practices, Makefiles, CI.
  And of course a complete Docker environment that should automatically provision a new WP install.
  Run `docker compose run --rm test make qa` to perform QA checks.

- Integrations with PHPStorm and tools via the IDE are included here. Inspect the database, run Composer or tests,
  perform powerful inspections without leaving the IDE, all configured for you.

- A very notable aspect is that this theme is [_modular_][modularity]. This is a very powerful approach whic 
  can bring tremendous agility to the SDLC, as it allows for easy prototyping, override/extension of any part
  of the application, easy management and extraction, and much more.

  Some parts are intended mainly for illustration. For example, the `blocks` module is 
  illustrates how a module may be self-encapsulated with very well-defined and separated concerns, while
  still robustly collaborating with other modules thanks to inversion of control from modules to the application.

  While the `themes` module is supposed to contain all things that are directly related to the theme,
  due to WP's "convention _instead of_ configuration" approach certain files have to be in the root directory of
  the project or in some specific directory relative to it. There are clunky ways to go around this, such as deploying
  symlinks during development and copying files from the module to the root during build. I'd prefer to keep it clean.

  Each module is intended to be as self-encapsulating as possible, and so each module has its own build process.
  Run `Run `docker compose run --rm build make build-modules` to build only the modules.

## Notes
- Created from [wp-oop/plugin-boilerplate][]. That is my code, as well as in many of the libraries used here.
- This is my first time making a block theme, let alone a custom block. I also haven't made a theme or implemented
    designs in a while. Please be kind :)
- Sadly, there are still many things that could really be improved, but I ran out of time. I'm sorry, and hope that
  what there _is_ is much more exciting than what there _isn't_.
    * Not all design elements have been implemented. There's still link effects for the menu, footer content,
      and menu styles that are very much missing. 
    * There's no process that builds the whole theme into a re-distributable package. While I have done this before,
      this is a very complex topic with many decisions to make, and those depend on the projected future of the project.
    * It's also simply impossible to implement some things in an editable way at all, because
      the software as well as the community and documentation are still evolving. An example of this is the
      "mobile breakpoint" - a viewport width, at which the site switches to a compact mode.
- I have separated some aspects of the work into separate PRs. Please feel free to review those, if that's convenient.
- There may be many new things here. If something is unclear, please feel free to read the linked documentation and that
  relating to the project's dependencies. I would love to give a guided tour, so please feel free to contact me too.
- I hope you like the project, and enjoy reviewing it!


[wp-oop/plugin-boilerplate]: https://github.com/wp-oop/plugin-boilerplate
[modularity]: https://dev.to/xedinunknown/cross-platform-modularity-in-php-30bo
