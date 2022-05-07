# TALL stack "To-do" list

## Initial Setup

### Installation
```
$ composer install
$ php artisan key:generate
```

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

## Demo 
* The demo makes use of user logins, so please register a new account to get access to the dashboard.
* Click on "My Tasks" in the navigation bar.
* Use the "Task" input field to enter a title for your new To-do list entry.
* If you forget to enter a "Task" title, form validation will display a helper message for you.
* If you registered more than one account, you can assign the task to someone else.
* The urgency of the task can be specified. Each level has a corresponding color code.
* After you've finished filling out the form, click the "Add" button, or hit the "Enter" key while the "Task" input is focused.
* New tasks are added to the "To-do" section.
* Finished tasks are moved to the "Completed" section.
* Each task can be clicked to toggle its "Finished" state.
* The lists section will auto refresh every 2 seconds to check for new tasks assigned to you by other users.