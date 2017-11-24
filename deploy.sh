#!/bin/bash

workspace=$(cd `dirname $0`; pwd)

function help(){
  echo "call me like:"
  echo "    deploy.sh init"
}

function init(){
  echo "start init website..."

  echo "the site path is $workspace."
  cd $workspace

  echo "prepare bootstrap/cache..."
  if [ ! -d "bootstrap/cache" ]; then
    mkdir bootstrap/cache
    chmod -R 777 bootstrap/cache
  fi

  echo "prepare storage and subdir..."
  # prepare runtime directory
  if [ ! -d "storage" ]; then
    mkdir storage
    chmod -R 777 storage
  fi

  if [ ! -d "storage/logs" ]; then
    mkdir storage/logs
    chmod -R 777 storage/logs
  fi

  if [ ! -d "storage/app" ]; then
    mkdir storage/app
    chmod -R 777 storage/app
  fi

  if [ ! -d "storage/app/cache" ]; then
    mkdir storage/app/cache
    chmod -R 777 storage/app/cache
  fi

  if [ ! -d "storage/app/public" ]; then
    mkdir storage/app/public
    chmod -R 777 storage/app/public
  fi

  if [ ! -d "storage/framework" ]; then
    mkdir storage/framework
    chmod -R 777 storage/framework
  fi

  if [ ! -d "storage/framework/cache" ]; then
    mkdir storage/framework/cache
    chmod -R 777 storage/framework/cache
  fi

  if [ ! -d "storage/framework/sessions" ]; then
    mkdir storage/framework/sessions
    chmod -R 777 storage/framework/sessions
  fi

  if [ ! -d "storage/framework/testing" ]; then
    mkdir storage/framework/testing
    chmod -R 777 storage/framework/testing
  fi

  if [ ! -d "storage/framework/views" ]; then
    mkdir storage/framework/views
    chmod -R 777 storage/framework/views
  fi

  # prepare db file
  if [ ! -f "storage/htech.db" ]; then
    echo "set storage/htech.db"
    cp database/template.db storage/htech.db
    chmod 777 storage/htech.db
  fi

  # prepare .env file
  if [ ! -f ".env" ]; then
    echo "create .env file..."
    echo "APP_ENV=local" > .env
    echo "APP_DEBUG=false" >> .env
    echo "APP_KEY=aaronhtechloghtechnshtechaha23ew" >> .env
    echo "" >> .env
    echo "DB_CONNECTION=sqlite" >> .env
    echo "DB_DATABASE="$workspace"/storage/htech.db" >> .env
  fi

  echo "Congratulations, this site init success!!!"
}

if [ $# -ne 1 ]; then
  help
  exit
fi

if [ $# -eq 1 ]; then
  case $1 in
    init)
      init
      ;;
    *)
      help
      ;;
  esac
fi




