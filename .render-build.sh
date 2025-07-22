#!/usr/bin/env bash

set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Copy .env
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate --force

# Install Node dependencies & build Vite
npm install
npm run build
