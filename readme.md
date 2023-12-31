## PHP Challenge
Project made in PHP Slim framework
The values are stored on a $_SERVER variable to make it easy to work with.

### Start server
#### By vanilla PHP
Running the following command `php -S localhost:8080 -t public public/index.php` would start the server on [http://localhost:8080](http://localhost:8080)
#### By Composer
Run `composer install` to install dependencies and then, just by running `composer start` it would start the server on [http://localhost:8080](http://localhost:8080)

#### File
The file named `ShipMonk.postman_collection.json` it's supposed to be a Postman collection to try the endpoints.
#### Endpoints
**Add to Sorted List:**

- **Method**: POST
- **Endpoint**: `/api/add`
- **Description**: Adds a value to the sorted linked list.
- **Request Payload**: `{ "value": 42 }`
- **Response**: JSON response indicating success or failure.

**Search in Sorted List:**

- **Method**: GET
- **Endpoint**: `/api/search/{value}`
- **Description**: Searches for a specific value in the sorted linked list.
- **Response**: JSON response indicating whether the value was found or not.

**Delete from Sorted List:**

- **Method**: DELETE
- **Endpoint**: `/api/delete/{value}`
- **Description**: Deletes a value from the sorted linked list.
- **Response**: JSON response indicating success or failure.

**Traverse Sorted List:**

- **Method**: GET
- **Endpoint**: `/api/traverse`
- **Description**: Traverses the sorted linked list and returns its elements.
- **Response**: JSON response containing the list elements.
