## Config

Set Base URL in application/config/config.php

```php
$config['base_url'] = 'localhost/all/TEST_FE/'; // change this
```

## Database

database .sql in folder "db_test.sql"

```php
'hostname' => 'localhost',
'username' => 'root', // change this
'password' => 'mysql', // change this
'database' => 'db_test', // change this
'dbdriver' => 'mysqli',
```

## API

```bash
base_url/index.php/api
```

Create

```bash
base_url/index.php/api/insert_barang
```
```bash
base_url/index.php/api/insert_user
```
```bash
base_url/index.php/api/insert_transaksi
```

Fetch/Read

```bash
base_url/index.php/api/fetch_barang
```
```bash
base_url/index.php/api/fetch_user
```
```bash
base_url/index.php/api/fetch_transaksi
```

Edit/Update

```bash
base_url/index.php/api/update
```
Edit Barang: required data "id_barang"

Edit User: required data "id_user"

Edit Transaksi: required data "id_transaksi"

Delete

```bash
base_url/index.php/api/delete
```
Delete Barang: required data "id_barang"

Delete User: required data "id_user"

Delete Transaksi: required data "id_transaksi"

## Slicing HTML

```bash
base_url/slicing_html
```

Done.
