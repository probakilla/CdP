#!/bin/bash

if [ ! -x "$(command -v composer)" ]; then
    echo "== \033[32mERROR:Composer is not installed !\e[0m"
    echo "== In order to use the linter, you have to install composer."
    echo "== Latest version available and a tutorial for installation here :"
    echo "== https://getcomposer.org/doc/00-intro.md"
fi

if [[ ! -d vendor ]]; then
    echo "== Installing composer packages..."
    composer update
fi

echo "== Formating project..."
vendor/bin/phpcbf src/php/**

echo "== Linting php files..."
vendor/bin/phpcs src/php/models/*

if [ $? == 0 ]; then
    echo -e "== \033[32mSUCCESS: Finished with no linting errors !\e[0m"
else
    echo -e "== \033[92mERROR: Linting errors found ! Please correct them before push !\e[0m"
fi