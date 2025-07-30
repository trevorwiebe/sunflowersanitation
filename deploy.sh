#!/bin/bash

# Sunflower Sanitation Website Deployment Script
# This script deploys all website files to the production server

# Configuration
HOST="mi3-ss123.a2hosting.com"
PORT="7822"
USERNAME="trevorw1"
REMOTE_DIR="/home/trevorw1/sunflowersanitation"
LOCAL_DIR="."

echo "🚀 Starting Sunflower Sanitation website deployment..."
echo "📁 Syncing files to server..."

# Deploy using rsync with SSH
rsync -avz --progress \
    -e "ssh -p $PORT" \
    --exclude='.git' \
    --exclude='.env' \
    --exclude='node_modules' \
    --exclude='.DS_Store' \
    --exclude='*.log' \
    --exclude='deploy.sh' \
    "$LOCAL_DIR/" \
    "$USERNAME@$HOST:$REMOTE_DIR/"

# Check if deployment was successful
if [ $? -eq 0 ]; then
    echo "✅ Deployment completed successfully!"
else
    echo "❌ Deployment failed! Please check your connection and try again."
    exit 1
fi