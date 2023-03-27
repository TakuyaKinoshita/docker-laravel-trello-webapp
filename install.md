1. setup larabel development station

```bash
$ git clone https:
```

1. install make

```bash
$ sudo apt install make
$ make -v
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
$ composer require laravel/ui
$ php artisan ui vue
$ npm install
```

1. laravel-mixのインストール

```bash
$ npm install laravel-mix --save-dev
```

1. テストデータの作成

```bash
$ php artisan make:factory CustomerFactory
$ php artisan make:seeder CutomerTableSeeder
```

***/src/database/factories/***
```CustomerFactory.php
<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_user_id' => $this->faker->name(),
            'customer_email' => $this->faker->unique()->safeEmail(),
            'customer_hash' => bcrypt('password')
        ];
    }

    /**
     */
    public function __construct() {
    }
}
```

***/src/database/seeders/***
```CustomerTableSeeder.php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(50)->create();
    }
}
```

```bash
$ php artisan db:seed --class=CustomerTableSeeder
```

```bash
$ mysql> select * from customers;
+-------------+------------------+--------------------------+--------------------------------------------------------------+
| customer_id | customer_user_id | customer_email           | customer_hash                                                |
+-------------+------------------+--------------------------+--------------------------------------------------------------+
|          45 | 田中 充          | kijima.naoki@example.org | $2y$10$8.hvQZsmMSxHyVyiCyn3suhOnEI5ZEAjcH1RkcSqWqZgtCE91A2ny |
|          24 | 若松 充          | naoto.miyake@example.org | $2y$10$Lg8RvQ7yKBVCgmx8tEhAaOmPjsVTO92v6n69GE6riJt49i2iQdw/y |
|          23 | 坂本 健一        | kaori.tanaka@example.org | $2y$10$vOHCWMPwsqNLO1hZATs6bu6U8z.2SvkW4PkQKBGavDumzVroHn6ci |
|          25 | 原田 香織        | usaito@example.net       | $2y$10$jL2jj/aM7hIsKFO249IUFu0BMEGe9te4tD/z9aGjNebayTiFpKeKq |
|          38 | 宇野 知実        | fekoda@example.org       | $2y$10$DbDFbM9wwYOHxqVoxq3ynO.ElSrgARzbrHvSeoC/DHSGOk4pUJ5Dm |
+-------------+------------------+--------------------------+--------------------------------------------------------------+
```