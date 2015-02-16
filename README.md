# Medula

**Starter Theme & Plugin for WordPress**

## Features

- It is a clean start point for a new WordPress theme.
- It is mobile first and progresively enhanced.
- It supports extended functionality via plugin.
- It is modular, versatile, and simple enough.
- It has a clear and well commented structure.
- Uses [Gulp](http://gulpjs.com/), [Bower](http://bower.io/), [Sass](http://sass-lang.com/), [Susy](http://susy.oddbird.net/) & [include-media](https://github.com/eduardoboucas/include-media).


## Quick Start

1. Clone the git repo or [download the zip file](https://github.com/andamira/medula/archive/master.zip).

	`git clone https://github.com/andamira/medula.git medula-master`

1. Install the dependencies

	1. First you need to make sure you have npm & bower installed in your system

	1. Then you need to got to the root of the project, where the files
	`package.json` & `bower.json` are located, and install the dependencies:
	```
	cd medula-master
	npm install
	bower install
	```

1. Customize the theme target directory name in the server here: `/src/sass/_dependencies.scss`

1. Then you can compile the the project with `gulp --dev` during development and `gulp` for production

1. Finally copy (or send, or symlink) the `theme/` directory into the WordPress themes directory, using the target directory name you configured before

1. Enjoy


## Contributing

_This project is still going through many many changes. But feel free to [submit bugs & fixes](https://github.com/andamira/medula/issues)._


## Licenses

Original Code is licensed under the [MIT License](https://github.com/andamira/medula/blob/master/LICENSE.md).

Images are licensed under [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/).


