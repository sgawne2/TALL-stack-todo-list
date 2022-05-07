# TALL stack "To-do" list

## Initial Setup

### Installation
```
$ composer install
```

### Environment Variables

* Create your .env in the root directory of this project
* Make sure your 
DB_DATABASE,
DB_USERNAME,
and
DB_PASSWORD
variables are all set correctly
* Generate the APP_KEY

```
$ php artisan key:generate
```

### Server

#### Standard
```
$ php artisan serve
```

#### Using [Laravel Sail](https://laravel.com/docs/sail)
```
$ ./vendor/bin/sail up -d
```

## Demo 
* The demo makes use of user logins, so please register a new account to get access to the dashboard.
* After logging in and being sent to the dashboard, click on "My Tasks" in the navigation bar.
* Alternatively, just navigate to /tasks
* Use the "Task" input field to enter a title for your new To-do list entry.
* If you forget to enter a "Task" title, form validation will display a helper message for you.
* If you registered more than one account, you can assign the task to someone else.
* The urgency of the task can be specified. Each level has a corresponding color code.
* After you've finished filling out the form, click the "Add" button, or hit the "Enter" key while the "Task" input is focused.
* New tasks are added to the "To-do" section.
* Finished tasks are moved to the "Completed" section.
* Each task can be clicked to toggle its "Finished" state.
* The lists section will auto refresh every 2 seconds to check for new tasks assigned to you by other users.