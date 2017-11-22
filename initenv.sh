if [ ! -d "storage" ]; then
  mkdir storage
fi

if [ ! -d "storage/logs" ]; then
  mkdir storage/logs
fi

if [ ! -d "bootstrap/cache" ]; then
  mkdir bootstrap/cache
fi

if [ ! -d "storage/app" ]; then
  mkdir storage/app
fi

if [ ! -d "storage/app/cache" ]; then
  mkdir storage/app/cache
fi

if [ ! -d "storage/app/public" ]; then
  mkdir storage/app/public
fi

if [ ! -d "storage/framework" ]; then
  mkdir storage/framework
fi

if [ ! -d "storage/framework/cache" ]; then
  mkdir storage/framework/cache
fi

if [ ! -d "storage/framework/sessions" ]; then
  mkdir storage/framework/sessions
fi

if [ ! -d "storage/framework/testing" ]; then
  mkdir storage/framework/testing
fi

if [ ! -d "storage/framework/views" ]; then
  mkdir storage/framework/views
fi


chmod -R 777 storage/app
chmod -R 777 storage/logs
chmod -R 777 bootstrap/cache
chmod -R 777 storage/framework


