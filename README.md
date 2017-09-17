This is a demo of a simple REST service using Laravel.
Demo can be accessed at https://lawline.herokuapp.com/

API authentication works by verifying a user’s api_token coming in on the request’s header.
I am using Laravel’s auth:api driver to verify that token exists in our Users table.
If no user is found, an error message will be returned.

Postman can be used to test RESTful functionality of this API, basic PHPUnit tests have also been written.

To utilize the REST service you will need to configure Postman with the following header if POSTing or GETing:
````
Accept application/json
Content-Type application/json
Authorization Bearer (60chartoken) 
- For example, Bearer 111111111111111111111111111111111111111111111111111111111111111
````

Depending on the method, you may have to provide valid JSON objects, such as:
````
POST
https://lawline.herokuapp.com/api/v1/addProduct

{
	"product": {
		"name": "freds product“,
		"description": "desciption text”,
		"price": "$88",
		"image": ""
	}
}

https://lawline.herokuapp.com/api/v1/updateProductImage

{
	"product": {
		"id" : 23,
		"image": "someimg"
	}
}

https://lawline.herokuapp.com/api/v1/getProduct

{
	"product": {
		"id": 5
	}
}

https://lawline.herokuapp.com/api/v1/deleteProduct

{
	"product": {
		"id": 22
	}
}

https://lawline.herokuapp.com/api/v1/addProductToUser

{
	"product": {
		"id": 4
	}
}

https://lawline.herokuapp.com/api/v1/removeProductFromUser

{
	"product": {
		"id": 4
	}
}

GET
https://lawline.herokuapp.com/api/v1/getAllProducts
https://lawline.herokuapp.com/api/v1/listUserProducts

````

To create tables in the database I am using Eloquent with Laravel, migrations have been included that should create a table provided the proper database credentials are used. In lieu of a live MySQL server I am using Laravel’s  SQLite file as the framework is agnostic to database choice. For deployment to Heroku, MySQL was used.

To seed the database with the initial 5 users with products the following command will need to be ran:
````
php artisan db:seed
or
php artisan migrate:refresh --seed
````

To test locally, ‘php artistan serve’ can be used.

To run unit tests, the command ‘phpunit’ may be used, testing is currently minimal code coverage wise.
