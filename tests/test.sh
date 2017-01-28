#!/usr/bin/env bash

TMP1=$(mktemp)
TMP2=$(mktemp)
TMP3=$(mktemp)

echo "Hello World" > $TMP1

# ok test

echo "" | ./main.php encrypt $TMP1 $TMP2
echo "" | ./main.php decrypt $TMP2 $TMP3

if [[ `cat $TMP3` == "Hello World" ]]; then
	echo "OK"
else
	echo "FAIL"
fi


# error test

echo "" > $TMP3

echo "" | ./main.php encrypt $TMP1 $TMP2
echo "abc" >> $TMP2
echo "" | ./main.php decrypt $TMP2 $TMP3 2&> /dev/null

if [[ `cat $TMP3` == "" ]]; then
	echo "OK"
else
	echo "FAIL"
fi


# cleanup

rm $TMP1
rm $TMP2
rm $TMP3
