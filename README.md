
# LaravelUserLogs

This Laravel package allows you to store user logs.


## Usage/Examples
### Install Using Composer
```javascript
composer require dipesh79/laravel-user-logs
```

### Publish Vendor File For Migration
```
php artisan vendor:publish --provider="Dipesh79\LaravelUserLogs\LaravelLogServiceProvider"
```
or 
```
php artisan vendor:publish
```
And publish "Dipesh79\LaravelUserLogs\LaravelLogServiceProvider"

Run Migration

```
php artisan migrate
```


## Model
Use ```HasLog``` Trait in your model

```
<?php

namespace App\Models;

use Dipesh79\LaravelUserLogs\Traits\HasLog;

class User extends Authenticatable
{
    use HasLog;
```
Store logs in database

```
$user = \App\Models\User::create(
        [
          ...
        ]
    );
    $user->logs()->create(
        [
            'action' => 'Create', //Create,Update & Delete
            'ip_address' => request()->ip(),
            'device' => request()->userAgent(),
            'user_id' => auth()->user()->id
        ]
    );
```


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Author

- [@Dipesh79](https://www.github.com/Dipesh79)


## Support

For support, email dipeshkhanal79@gmail.com.

