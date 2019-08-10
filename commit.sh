#!/usr/bin/env bash

if [[ "$1" == "" ]]; then
    printf "You must specify a commit message!\n"
    exit;
fi

git status;
git add -A;
git commit -m "$1";
git push;
