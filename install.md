1. setup larabel development station

```bash
$ git clone https:
```

1. install make

```bash
$ sudo apt install make
$ make -v
```

1. コンテナイメージの作成と起動

```bash
$ mkdir -p src
$ docker compose build
$ docker compose up -d
$ docker compose exec app composer create-project --prefer-dist laravel/laravel .
$ docker compose exec app php artisan key:generate
$ docker compose exec app php artisan storage:link
$ docker compose exec app chmod -R 777 storage bootstrap/cache
$ docker compose exec app php artisan migrate
```

1. makeでのlaravelのセットアップ

```bash
$ make install
```

1. docker上のbashにアクセス

```bash
$ make app
```

1. データベースのmigration処理

```bash
$ php artisan make:migration create_customer_table
$ php artisan make:migration create_member_table
$ php artisan make:migration create__table
$ php artisan make:migration create_customer_table
$ php artisan make:migration create_customer_table
$ php artisan make:migration create_customer_table
$ php artisan make:migration create_customer_table
```

1. フロントエンドをVue.jsで構築するためにNode環境の構築

```bash
$ apt update
$ apt install -y nodejs npm
$ npm install -g n
$ n stable
$ apt purge -y nodejs npm
$ npm install -g npm@9.6.1 # 最新バージョンにアップデート
```

一度Dockerコンテナのbashからログアウトして、もう一度Dockerコンテナのbashに入りなおす

```bash
$ exit
$ make app
```

フロントエンド用のlaravelのvueフレームワークをインストール

```bash
$ composer require laravel/ui
$ php artisan ui vue
$ npm i @vitejs/plugin-vue
$ npm install
```