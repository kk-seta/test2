## 環境安裝
```
1. 更動.host
sudo vim /etc/hosts
127.0.0.1 product-api.docker.kkday.com

2. 到kkdock 根目錄
> sh init-nginx-site.sh
> kkday-product-service-api
> laravel
> product-api.docker.kkday.com

3. kkdock 進入container
docker-compose exec workspace bash

4. 安裝套件
> cd kkday-product-service-api
> composer install 
> npm install
> cp hook/pre-commit .git/hooks/pre-commit
```

## 執行單元測試
```
vendor/bin/phpunit 
```

## 檢查 code style
```
vendor/bin/phpcs
```

## 檢查 phpmd
```
vendor/bin/phpmd app,tests text phpmd.xml --suffixes php
```

## 執行API測試
```
node_modules/.bin/newman run 
```

## Swagger 
```
http://product-api.docker.kkday.com/api/documentation
```