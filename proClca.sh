#!/bin/bash
echo "borrando cache..."
./sf cache:clear --env=prod
./sf assets:install web --symlink
chown -R apache:apache *
chmod -R 750 * 
rm -Rf app/cache/* app/logs/*
find . -name "*~" -exec rm -rf {} \;
