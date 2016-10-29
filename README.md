# <img src="https://raw.githubusercontent.com/andamira/medula/master/src/img/favicon-big.png" height="64" valign="bottom"> medula

**Starter Theme + Plugin for WordPress**

![Version alpha](https://img.shields.io/badge/version-alpha-D6A920.svg)
[![Join the chat room](https://img.shields.io/badge/open-chat_room-21759b.svg)](https://gitter.im/andamira/medula)

******

## Features

- :white_large_square: It is a minimal blank canvas.
- :bike: Focus is on simplicity & handiness.
- :book: Following standards & best practices.
- :put_litter_in_its_place: Doesn't support older browsers (IE8) by default.
- :memo: Each file has an index, relevant comments and links.
- :rocket: Enable extended functionality in the theme and with optional plugin.

> Mobile first, and progressively enhanced. Uses procedural programming (no OO). Very modular. Incorporates a minimal optional plugin framework. Painless to tinker with it. Easy to understand it _fully_.

## Quick Start

### Installation

1. Install [npm](https://www.npmjs.com/) & [bower](http://bower.io/) globally, if you don't already have them.
1. Clone the repo and download its dependencies with: `npm install && bower install`.

### First Contact

* Take a look into [`theme/functions.php`](theme/functions.php) to see how the functionality is structured.
* Take a look into [`src/sass/main.scss`](src/sass/main.scss) to see how styles are structured.
* You can edit the file [`theme/style.css`](theme/style.css) to customize your theme name and data.
* Take a look into [`plugin/plugin.php`](plugin/plugin.php) to customize the extended plugin functionality.
* Configure the project dependencies in [`gulpfile.js`](gulpfile.js) and [`bower.json`](bower.json).

### Deploy it

1. Use `gulp --dev` to compile your project during development and `gulp` for production.
1. The `theme/` directory must be deployed inside WordPress `/wp-content/themes/` directory.
  * The name you give the theme directory should be in [`src/sass/deps/_global.scss`](src/sass/deps/_global.scss)
1. The `plugin/` directory must be deployed inside `/wp-content/plugins/` in Wordpress.

## Documentation

You will find more information in the [Medula Wiki. :blue_book:](https://github.com/andamira/medula/wiki)

## Contributing

Feel free to join the [gitter chat room :speech_balloon:](https://gitter.im/andamira/medula) and to [submit bugs & proposals. :construction:](https://github.com/andamira/medula/issues)
