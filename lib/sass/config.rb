#
# This is the compass configuration file
# Compass is a great cross-platform tool for compiling SASS.
#
# http://compass-style.org/help/documentation/configuration-reference/
# http://net.tutsplus.com/tutorials/html-css-techniques/using-compass-and-sass-for-css-in-your-next-project/


#
# 0. Dependencies
#

require "compass/import-once/activate"
require "susy"
require "breakpoint"
require "sassy-maps"
#require "SassyLists"


#
# 1 Set this to the root of your project when deployed
#

http_path = "/"


#
# 2. You can select your preferred output style here (can be overridden via the command line):
#

output_style = :expanded
#output_style = :compressed	# On launch, uncomment this line and comment the above one


#
# 3. To disable debugging comments that display the original location of your selectors. Uncomment:
#

# line_comments = false


#
# 4. Default options. You'll probably don't have to touch these
#

css_dir = "../css"
sass_dir = "./"
images_dir = "../img"
javascripts_dir = "../js"
fonts_dir = "../fonts"
relative_assets = true
environment = :development

# don't touch this
preferred_syntax = :scss

