#
# This is the compass configuration file
# Compass is a great cross-platform tool for compiling SASS.
#
#    0 Choose Environment (development | production)
#
#    1 Require Dependencies
#
#    2 Default Paths & Options
#
#    3 Environment Options
#
#    4 Don't Touch
#
# http://compass-style.org/help/documentation/configuration-reference/
# http://net.tutsplus.com/tutorials/html-css-techniques/using-compass-and-sass-for-css-in-your-next-project/


#
# 0 CHOOSE ENVIRONMENT
#

environment = :development
#environment = :production		# < uncomment this line on production


#
# 1 REQUIRE DEPENDENCIES
#
# See style.scss : "2 Dependencies"
#

require "compass/import-once/activate"
require "susy"
require "breakpoint"
require "breakpoint-slicer"
require "sassy-maps"
require "SassyLists"


#
# 2 DEFAULT PATHS & OPTIONS
#

http_path = "/"

css_dir = "../css"
sass_dir = "./"
images_dir = "../img"
javascripts_dir = "../js"
fonts_dir = "../fonts"

relative_assets = true


#
# 3 ENVIRONMENT OPTIONS
#

if environment == :development

	# For Development
	output_style = :expanded
	line_comments = true
	sourcemap = true

else

	# For Production
	output_style = :compressed
	line_comments = false
	sourcemap = false

end


#
# 4 DON'T TOUCH THIS
#

preferred_syntax = :scss

