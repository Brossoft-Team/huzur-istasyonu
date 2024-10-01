#!/bin/bash

# Clear the terminal for better readability
clear

# Run Laravel migration and seeding commands
echo "Running migrations..."
php artisan migrate:fresh

echo "Seeding the database..."
php artisan db:seed

# Install npm dependencies
echo "Installing npm dependencies..."
npm install

# Build the assets
echo "Building the project..."
npm run build

echo "All tasks completed successfully!"
