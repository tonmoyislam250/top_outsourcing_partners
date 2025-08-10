#!/bin/bash

# Railway deployment script for Laravel storage
echo "🚀 Starting Laravel deployment on Railway..."

# Create necessary directories
echo "📁 Creating storage directories..."
mkdir -p storage/app/public/blog-images
mkdir -p public/storage
mkdir -p storage/logs
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views

# Set permissions
echo "🔧 Setting permissions..."
chmod -R 755 storage
chmod -R 755 public

# Try to create storage link
echo "🔗 Creating storage link..."
if ! php artisan storage:link 2>/dev/null; then
    echo "⚠️  Symlink failed, copying files instead..."
    cp -rf storage/app/public/* public/storage/ 2>/dev/null || true
fi

# Clear and cache configurations
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "📦 Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Ensure database exists and run migrations
echo "🗄️  Running database migrations..."
php artisan migrate --force

echo "✅ Deployment completed!"
