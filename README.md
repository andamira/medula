# Osea Theme

**A Mobile First Starter Theme & Plugin for WordPress**

## Features

- It is a clean start point for a new WordPress theme.
- It is mobile first and progresively enhanced.
- It is modular, versatile, and simple enough.
- Uses [Gulp](http://gulpjs.com/), [Bower](http://bower.io/), [Sass](http://sass-lang.com/), [Susy](http://susy.oddbird.net/) & [include-media](https://github.com/eduardoboucas/include-media).
- It has a clear and well commented structure.


## Quick Start

1. Clone the git repo or [download the zip file](https://github.com/andamira/osea/archive/master.zip).

	`git clone https://github.com/andamira/osea.git`

1. Install the dependencies

	1. First you need to have npm & bower in your system

	1. Then you need to install the local dependencies from the root of the project:
	```
	npm install
	bower install
	```

1. Configure your themes' directory name for the server in: `/src/sass/_dependencies.scss`

	e.g.: `mytheme`

1. You can compile the the project with `gulp --dev` during development and `gulp` for production

1. Copy (or symlink) the `theme/` directory to the WordPress themes directory , using for the target directory name the same name you configured before.

	e.g.: `cp -r theme ~/www/wordpress/wp-content/themes/mytheme`

1. Make changes, compile, see the result, develop websites.


## Contributing

_This project is still going through many many changes. But feel free to [submit bugs & fixes](https://github.com/andamira/osea/issues)._

## Main TODO Points

- Improve the accesibility ([#3](https://github.com/andamira/osea/issues/3), [#4](https://github.com/andamira/osea/issues/4), [#8](https://github.com/andamira/osea/issues/8), [#9](https://github.com/andamira/osea/issues/9))

## Licenses

Original Code is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Images are licensed under [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/).


