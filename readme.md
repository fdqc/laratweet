
## About this Project

This is a Twitter like app made with Laravel 5.5. For the moment it allows to:

- Access a route: *api/user/{userId}/last-comments* to get the latest 10 comments that the user created.
- See a list of all the comments in the app.
- Register into the system.
- Login and create new comments.
- Follow and stop following a user.
- See a list of a user's followers and followed users.

## How to run the Project

1. First you need to download or clone the repository, for example:

```git
	git clone https://github.com/fdqc/laratweet.git
```

2. Then enter into the folder

```shell
	cd laratweet
```

3. After that run:

```shell
    composer install
    cp .env.example .env
    php artisan key:generate
```

4. Create a new database, for example on MySQL shell run:

```mysql
	create database laratweet;
```

5. Now edit .env file to match your MySQL configuration:

   DB_CONNECTION=mysql

   DB_HOST=127.0.0.1

   DB_PORT=3306

   DB_DATABASE=laratweet

   DB_USERNAME=root

   DB_PASSWORD=root

6. After that, you should be able to run:

```shell
    php artisan migrate
    php artisan db:seed
```

## Serving the App

Inside the project's folder run:

```shell
php artisan serve
```

This will serve the application on the PHP development server at http://127.0.0.1:8000.

Now open your favorite web browser, go to http://127.0.0.1:8000 and you should be able to use the app. Accessing http://127.0.0.1:8000/api/user/2/last-comments should get you an array of 10 elements with the following format:


```json
{
	"created_at": "Mon Mar 25 02:17:06 +0000 2019",
	"text": "Non iusto exercitationem aliquam ut aut earum. Quae suscipit illum minus quis consequatur. Aperiam ut ipsum quia et.",
	"in_reply": {
		"id": 4,
		"name": "Charity Mueller"
	}
}
```

Go to http://127.0.0.1:8000 and create register yourself. Once logged in, you'll be able to add new comments.

Finally, enjoy!

## Running some Tests

The application has tests written to work with Laravel Dusk. 

The first test confirms that when you visit http://127.0.0.1:8000 you are not redirected, while the second test that a user logs into the application and then writes a comment.

To successfully run the tests you need to:

- Update your .env file with the `APP_URL` environment variable to match the URL you use to access your application in a browser. 

  For this example: APP_URL = http://127.0.0.1:8000

- Be sure that the database has at least one user.

Now, serve the application with

```shell
php artisan serve
```

Open another tab in the terminal and run the dusk command

```shell
php artisan dusk
```

This should run both tests and pass.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
