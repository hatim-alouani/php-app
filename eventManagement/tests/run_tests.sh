#!/bin/bash

set -e

echo "[*] Running tests..."

# Ensure we're in the right directory
cd /var/www/html

# Initialize composer only if not already initialized
if [ ! -f composer.json ]; then
    echo "Initializing Composer..."
    composer init --no-interaction --name="event/system" --require-dev="phpunit/phpunit:^9"
fi

echo "Installing dependencies..."
composer install

echo "Running PHPUnit tests..."
./vendor/bin/phpunit --testdox tests

echo "[✔] Tests completed!"
