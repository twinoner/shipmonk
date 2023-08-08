## PHP Challenge
Project made in PHP Slim framework
The values are stored on a $_SERVER variable to make it easy to work with.

### Start server
#### By vanilla PHP
Running the following command `php -S localhost:8080 -t public public/index.php` would start the server on [http://localhost:8080](http://localhost:8080)
#### By Composer
Run `composer install` to install dependencies and then, just by running `composer start` it would start the server on [http://localhost:8080](http://localhost:8080)

#### Endpoints
**Add to Sorted List:**

- **Method**: POST
- **Endpoint**: `/api/add-to-sorted-list`
- **Description**: Adds a value to the sorted linked list.
- **Request Payload**: `{ "value": 42 }`
- **Response**: JSON response indicating success or failure.

**Search in Sorted List:**

- **Method**: GET
- **Endpoint**: `/api/search-in-sorted-list/{value}`
- **Description**: Searches for a specific value in the sorted linked list.
- **Response**: JSON response indicating whether the value was found or not.

**Delete from Sorted List:**

- **Method**: DELETE
- **Endpoint**: `/api/delete-from-sorted-list/{value}`
- **Description**: Deletes a value from the sorted linked list.
- **Response**: JSON response indicating success or failure.

**Traverse Sorted List:**

- **Method**: GET
- **Endpoint**: `/api/traverse-sorted-list`
- **Description**: Traverses the sorted linked list and returns its elements.
- **Response**: JSON response containing the list elements.
