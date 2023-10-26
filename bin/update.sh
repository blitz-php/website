#!/bin/bash

if [ ! -f composer.json ]; then
    echo "Veuillez vous assurer d'exécuter ce script à partir du répertoire racine de ce dépôt."
    exit 1
fi

composer install
source "$(dirname "$0")/checkout_latest_docs.sh"
php klinge app:publish:assets
# npm install
# npm run build
