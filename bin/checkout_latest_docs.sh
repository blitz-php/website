#!/bin/bash

DOCS_VERSIONS=(
  dev
)

for v in "${DOCS_VERSIONS[@]}"; do
    if [ -d "resources/docs/$v" ]; then
        echo "Extraire les dernières mises à jour de la documentation for $v..."
        (cd resources/docs/$v && git pull)
    else
        echo "Clonage $v..."
        git clone --single-branch --branch "$v" https://github.com/blitz-php/docs "resources/docs/$v"
    fi;
done
