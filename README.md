## Site Web BlitzPHP

Ceci est la source du [site web officiel BlitzPHP](http://blitz-php.byethost14.com).

## Développement local

Si vous souhaitez travailler sur ce projet sur votre ordinateur local, vous pouvez suivre les instructions ci-dessous. Ces instructions supposent que vous servez le site depuis un répertoire `~/Sites` :

1. Forkez ce référentiel
2. Ouvrez votre terminal et `cd` dans votre dossier `~/Sites`
3. Clonez votre fork dans le dossier `~/Sites/blitz-php`, en exécutant la commande suivante *avec votre nom d'utilisateur placé dans l'emplacement {username}* :
     ```bash
     git clone git@github.com : {username}/blitzphp-website siteweb
     ```
4. CD dans le nouveau répertoire que vous venez de créer :
     ```bash
     cd siteweb
     ```
5. Exécutez le script bin `setup.sh`, qui effectuera toutes les étapes nécessaires pour préparer votre installation locale :
     ```bash
     ./bin/setup.sh
     ```

### Synchronisation des modifications en amont dans votre Fork

Cet [article GitHub](https://help.github.com/en/articles/syncing-a-fork) fournit des instructions sur la façon d'extraire les dernières modifications de ce référentiel dans votre fork.

### Mise à jour après les modifications du code à distance

Si vous transférez les modifications en amont de ce référentiel vers votre référentiel local, vous souhaiterez mettre à jour vos dépendances Composer et NPM, ainsi que mettre à jour vos branches de documentation. Pour plus de commodité, vous pouvez exécuter le script `bin/update.sh` pour mettre à jour ces éléments :

```bash
./bin/update.sh
```