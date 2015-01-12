#
# This is the compass configuration file
# Compass is a great cross-platform tool for compiling SASS.
#
# http://compass-style.org/help/documentation/configuration-reference/
# http://net.tutsplus.com/tutorials/html-css-techniques/using-compass-and-sass-for-css-in-your-next-project/


#
# 0. Dependencies
#
# See style.scss "2 Dependencies"
#

require "compass/import-once/activate"
require "susy"
require "breakpoint"
require "breakpoint-slicer"
require "sassy-maps"
require "SassyLists"


#
# 1 Set this to the root of your project when deployed
#

http_path = "/"


#
# 3. You can select your preferred output style here. Use :compressed for production
#

environment = :development
#environment = :production		# < enable on production


#
# 3. You can select your preferred output style here. Use :compressed for production
#

output_style = :expanded
#output_style = :compressed		# < enable on production


#
# 4. To disable debugging comments that display the original location of your selectors. Uncomment:
#

#line_comments = false			# < enable on production


#
# 5. Generate source maps. See http://thesassway.com/intermediate/using-source-maps-with-sass
#

sourcemap = true


#
# 6. Default options and paths. You'll probably don't have to touch these
#

css_dir = "../css"
sass_dir = "./"
images_dir = "../img"
javascripts_dir = "../js"
fonts_dir = "../fonts"
relative_assets = true

# don't touch this
preferred_syntax = :scss

