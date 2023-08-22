
# LaravelUserLogs

This Laravel package allows you to store user logs.
This package automatically stores the logs when a model is created, updated, or deleted.


## Usage/Examples
### Install Using Composer
```bash
composer require dipesh79/laravel-user-logs
```

### Publish Vendor File For Migration
```bash
php artisan vendor:publish --provider="Dipesh79\LaravelUserLogs\LaravelLogServiceProvider"
```
or 
```bash
php artisan vendor:publish
```
And publish `Dipesh79\LaravelUserLogs\LaravelLogServiceProvider`

### Run Migration

```bash
php artisan migrate
```


## Model
Use ```HasLog``` Trait in your model. This will create a relation between your model and the `Log` model.

```php
<?php

namespace App\Models;

use Dipesh79\LaravelUserLogs\Traits\HasLog;

class User extends Authenticatable
{
    use HasLog;
```

### Store logs in database

You can call the `logs()->create([...])` method on your model to store the logs in the database.
Follow the example below:

```php
$user = \App\Models\User::create([
          ...
        ]);
        
$user->logs()->create([
        'action' => 'Create', //Create,Update & Delete
        'ip_address' => request()->ip(),
        'device' => request()->userAgent(),
        'user_id' => auth()->user()->id
    ]);
```

### Access User Logs
```php
$logs = \Dipesh79\LaravelUserLogs\Models\Log::get();
```

### Automated Static events for logs

The `Created`, `Updated`, `Deleted` events are fired when a model is created, updated, or deleted, respectively.
You don't have to do anything else, this package will automatically store the logs in the database.

## License

[MIT](https://choosealicense.com/licenses/mit/)


## Author

- [@Dipesh79](https://www.github.com/Dipesh79)


## Support

For support, email dipeshkhanal79@gmail.com.

