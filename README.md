# Ósea Theme

**A Mobile First Starter Theme for WordPress**

Ósea is commited to semantic HTML5 markup and CSS3. It has many features and focuses in finding the sweet spot between minimallism and versatility.

## Quick Start

1. Clone the git repo or [download the zip file](https://github.com/andamira/osea/archive/master.zip).

  `git clone https://github.com/andamira/osea.git`

2. Install the dependencies

  `gem install compass sass susy breakpoint --no-ri --no-rdoc`

3. Place it in theme folder, activate it from WordPress, and start developing.

4. You can run `compass-watch.sh` script from `/lib/sass/` folder to automaticaly monitor the changes and compile css in the fly.

## Features & Key Points

* Starter Theme

  Ósea is not designed to be a parent theme or a framework. It is designed to be a clean starting point for any project, modifying it as needed.

* Simplicity & Minimalism

  Everything has a purpose and its own place. It is simple enough to be easily understood, as well as very powerful.

* Modularity and Maintainability.
	It adheres to DRY principles. Clear documentation. Index present in all files. Follows the [WordPress Coding Standards](https://make.wordpress.org/core/handbook/coding-standards/).

* Mobile First

  Lightweight, Progressively Enhanced, Powerful Grid System.

* Advanced Functionality

  Ósea comes with a stater plugin named Médula where you can write all the functionality that [doesn't really belong in the theme](http://justintadlock.com/archives/2013/09/14/why-custom-post-types-belong-in-plugins) like Custom Post Types, Taxonomies, Shortcodes, Analytics, etc. You can enable it from the functions.php file for rapid protopying, but you should move the folder to the plugins folder and turn it into a standalone plugin for serious use. [[WIKI]](https://github.com/andamira/osea/wiki/Plugin)

* Debug mode *(experimental)*

  You can enable it in the functions.php file to help debugging new templates, grids and layouts.

* Accesibility

  Makes use of compatibility & accesibility standards.

## History

It originally started as a fork of [Bones](https://github.com/eddiemachado/bones), but many things have changed since then.

It depends on [Compass](http://compass-style.org), [Sass >=3.4](http://sass-lang.com/), [Susy](http://susy.oddbird.net/) and [Breakpoint](http://breakpoint-sass.com/). It also includes [Modernizr](http://modernizr.com/) and several optional jQuery libraries. It supports all modern browsers.


## Contributing

_Warning: This project is still going through pretty big design & structural changes._

But feel free to [submit bugs & fixes](https://github.com/andamira/osea/issues).

## Licenses

Ósea Code is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Images are licensed under [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/).

Each third party js/jquery library included under `/lib/js/libs/` has their own license. See:
- [jQuery Cycle2](https://github.com/malsup/cycle2#copyright-and-license)
- [jQuery Dynatable](http://www.dynatable.com/license)
- [jQuery fragmentScroll](https://github.com/miWebb/jQuery.fragmentScroll/blob/master/LICENSE)
- [jQuery MMenu](https://github.com/BeSite/jQuery.mmenu#licence)

JShrink javascript minifier included in `/lib/js/JShrink/` is under the [BSD License](https://github.com/tedious/JShrink/blob/master/LICENSE).

