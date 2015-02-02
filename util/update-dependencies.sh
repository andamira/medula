#!/bin/bash

PATH_OSEA="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )/.."
PATH_INCLUDE="${PATH_OSEA}/lib/sass/vendors/include"
DIR_GIT_REPOS=".git-repositories"
DIR_TMP="temp"


cd $PATH_INCLUDE
mkdir -p $DIR_GIT_REPOS
cd $DIR_GIT_REPOS


# - First parameter is the git repo
# - Second parameter is the path to eliminate
# - Third and rest of the parameters
#   are the files & folders to copy
function update_dependency() {

	# Parameters
	GIT_REPO_URL="${1}"
	PATH_REMOVE="${2}"
	GIT_DIRNAME="$(echo ${*:3} | cut -d'/' -f1)"

	# Get files from repo
	if [ -d "$GIT_DIRNAME" ]; then
		echo -e "\nrepository $GIT_DIRNAME exists, updating...\n------------------------"
		cd $GIT_DIRNAME
		git pull
		cd ..
	else
		echo -e "\nrepository $GIT_DIRNAME doesn't exist, installing...\n------------------------"
		git clone ${GIT_REPO_URL}
	fi

	# Copy files with full path
	mkdir -p ${DIR_TMP}
	cp -r --parents ${*:3} ${DIR_TMP}

	# move files to the include dir
	cp -r ${DIR_TMP}/${PATH_REMOVE}/* ../
	rm -rf ${DIR_TMP}
}


# List of dependencies

#update_dependency "https://github.com/at-import/SassyLists.git" "SassyLists/stylesheets/SassyLists" "SassyLists/stylesheets/_SassyLists.scss"
update_dependency "https://github.com/at-import/Sassy-Maps.git" "Sassy-Maps/sass" "Sassy-Maps/sass/sassy-maps" "Sassy-Maps/sass/_sassy-maps.scss"
update_dependency "https://github.com/at-import/breakpoint.git" "breakpoint/stylesheets" "breakpoint/stylesheets/breakpoint" "breakpoint/stylesheets/_breakpoint.scss"
update_dependency "https://github.com/ericam/susy" "susy/sass" "susy/sass/_susy.scss" "susy/sass/susy/language/susy" "susy/sass/susy/language/_susy.scss" "susy/sass/susy/su" "susy/sass/susy/_su.scss" "susy/sass/susy/output"


