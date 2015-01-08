#!/bin/bash

case "$1" in
	""|start)
	echo "Starting compass watch..."
	if [ -f ./cwatch.pid ]
		then
		echo "Sorry, but compass is already watching this folder..."
		exit 1
	fi
	nohup compass watch > /dev/null 2>/dev/null &
	echo $! > ./cwatch.pid
	echo "Done."
	;;

	stop)
	echo "Stopping compass watch..."
	if [ -f ./cwatch.pid ]
		then
		xargs kill -9 < ./cwatch.pid
		rm ./cwatch.pid
		echo "Done."
		exit 0
	fi
	echo "Sorry, but compass is not watching this folder..."
	exit 1
	;;

	*)
	echo "Usage: cwatch {start|stop}"
	exit 1
	;;
esac

exit 0
