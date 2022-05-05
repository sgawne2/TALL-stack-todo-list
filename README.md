# TALL stack "To-do" list

## Initial Setup

### Environment Variables

* Create your .env in the root directory of this project
* Make sure 
DB_DATABASE,
DB_USERNAME,
and
DB_PASSWORD
are all set before migrating

### Migration

#### Standard
```
$ php artisan migrate
```

#### Using [Laravel Sail](https://laravel.com/docs/sail)
```
$ ./vendor/bin/sail up
$ ./vendor/bin/sail artisan migrate
```