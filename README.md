# Ósea Theme

**A Mobile First Starter Theme for WordPress**

Ósea is commited to semantic HTML5 markup and CSS3. It has many features and focuses in finding the sweet spot between minimalism and versatility.

## Features

- It is designed to be a clean starting point for a WordPress theme.
- It is mobile first and progresively enhanced.
- It is modular, versatile, and simple enough to understand it all.
- It has a clear, well documented structure.
- It is still going through many changes, wait for it.


## Quick Start

1. Clone the git repo or [download the zip file](https://github.com/andamira/osea/archive/master.zip).

  `git clone https://github.com/andamira/osea.git`

1. Install the dependencies

  `gem install compass sass susy breakpoint --no-ri --no-rdoc`
  `bower install`

1. Place it in theme folder, activate it from WordPress, and start developing.

1. You can run `compass-watch.sh` script from `/lib/sass/` folder to automaticaly monitor the changes and compile css in the fly.


## Contributing

_Warning: This project is not stable yet. But..._

Feel free to [submit bugs & fixes](https://github.com/andamira/osea/issues) if you want.

## Main TODO Points

- Manage packages with [Bower](http://bower.io) & [npm](https://www.npmjs.com)
- Substitute [breakpoint](https://github.com/at-import/breakpoint/) with [import-media](https://github.com/eduardoboucas/include-media)
- Remove dependency on Compass
- Manage build system with [Tup](https://github.com/gittup/tup)
    - Add [Autoprefixer](https://github.com/postcss/autoprefixer) to workflow
	- Add CSS, JS, HTML, etc. minification & concatenation to workflow
- Improve the accesibility
- Remove IE8 compatibility

## Licenses

Original Code is licensed under the [MIT License](http://opensource.org/licenses/MIT).

JShrink javascript minifier included in `/lib/js/JShrink/` is under the [BSD License](https://github.com/tedious/JShrink/blob/master/LICENSE).

Images are licensed under [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/).


