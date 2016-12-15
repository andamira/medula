# medula

**Starter Theme + Plugin for WordPress**

![Version pre-alpha](https://img.shields.io/badge/version-pre--alpha-red.svg)

******

## Purpose

The purpose of Medula is to be a very practical toolbox for clean crafting
a WordPress application/theme.

It can be adapted in many diferent ways, it's well structured, made of many
pieces that can be easily substituted, (de)activated, copied and improved.

## Features

- Has a clear and regular structure.
- Incorporates a minimal plugin framework.
- It has configurable tools and dependencies.
- Can be used as a starter theme, as a parent theme, or both.

## Structure

- Take a look into [`/theme/functions.php`](theme/functions.php) to see how the functionality is structured.
- Take a look into [`/assets/theme/sass/main.scss`](assets/theme/sass/main.scss) to see how styles are structured.
- You can edit the file [`/theme/style.css`](theme/style.css) to customize your theme name and data. 
- Take a look into [`/plugin/plugin.php`](plugin/plugin.php) to customize the extended plugin functionality.
- Configure the project dependencies in [`/gulpfile.js`](gulpfile.js) and [`bower.json`](bower.json).

## Instructions

### Using it as a Starter Theme

* Modify everything as you need. 
* Compile

#### Install

1. Install [npm](https://www.npmjs.com/) & [bower](http://bower.io/) globally, if you don't already have them. 
1. Clone the repo and download its dependencies with: `npm install && bower install`.

#### Deploy

1. Use `gulp --dev` to compile your project during development and `gulp` for production.
1. The `theme/` directory must be deployed inside WordPress `/wp-content/themes/` directory.
  * The name you give the theme directory should be in [`/assets/theme/sass/deps/_global.scss`](assets/theme/sass/deps/_global.scss)
1. The `plugin/` directory must be deployed inside `/wp-content/plugins/` in Wordpress.

## Status

This project is not yet stable.
