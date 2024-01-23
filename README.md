# LaravelUserLogs

[![Latest Stable Version](http://poser.pugx.org/dipesh79/laravel-user-logs/v)](https://packagist.org/packages/dipesh79/laravel-user-logs)
[![Total Downloads](http://poser.pugx.org/dipesh79/laravel-user-logs/downloads)](https://packagist.org/packages/dipesh79/laravel-user-logs)
[![License](http://poser.pugx.org/dipesh79/laravel-user-logs/license)](https://packagist.org/packages/dipesh79/laravel-user-logs)

This Laravel package allows you to store user logs.
This package automatically stores the logs when a model is created, updated, or deleted.

## Usage/Examples

### Install Using Composer

```bash
composer require dipesh79/laravel-user-logs
```

### Publish Vendor File For Migration

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

### Automated Static events for logs

The `Created`, `Updated`, `Deleted` events are fired when a model is created, updated, or deleted, respectively.
You don't have to do anything else, this package will automatically store the logs in the database.


### Access User Logs
```php
$logs = \Dipesh79\LaravelUserLogs\Models\Log::get();
```

### V 1.4 update

View User Logs
```
Route::get('/logs', [Dipesh79\LaravelUserLogs\Controllers\UserLogController::class, 'index'])->name('logs');
```
Don't forget to guard this route with your custom or pre-defined middleware

### V 1.4.1 update

## Config File

```php
    <?php

return [
    /**
     * Log Viewer Theme | Options: bootstrap.
     */

    'theme' => 'bootstrap',

    /**
     * Pagination Count.
     */
    'pagination' => 10,

    /**
     * User Identifier from users table.
     */
    'user_identifier' => 'name',

    /**
     * Return page from log view page.
     */
    'return_page' => [
        /**
         * Route Type | Options: route, url.
         */
        'route_type' => 'url',
        /**
         * Route Name or URL.
         */
        'url' => '/'
    ]

];
```

Chose theme for user log viewer. Currently only bootstrap theme is available.
You can change the pagination count for user log viewer.
You can change the user identifier from users table. By default it is `name`.
You can change the return page from user log viewer. By default it is `/`. You can change it to your custom route or
url.

### V 1.5.0  Update
Now updated values will be stored in database and view them in user log viewer.

Get Access to Old Values And Updated Values in your model
```php
    $user_log = \Dipesh79\LaravelUserLogs\Models\Log::find(1);
    $old_values = $user_log->old_data;
    $updated_values = $user_log->changed_values;

```


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Author

- [@Dipesh79](https://www.github.com/Dipesh79)


## Support

For support, email dipeshkhanal79@gmail.com.

