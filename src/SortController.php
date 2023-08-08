<?php

declare(strict_types=1);

namespace App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Helpers\SortedLinkedList;

class SortController
{
    private $sortedList;
    /**
     * SortController constructor.
     */

    public function __construct() {
        $this->sortedList = new SortedLinkedList();
    }

    public function addToSortedList(Request $request, Response $response, array $args)
    {
        $data = $request->getParsedBody();
        $value = $data['value'];
        $res = $this->sortedList->insert($value);

        // Return a JSON response
        $responseBody = [
            'message' => "Value added to sorted list: $value",
            'result' => $res
        ];
        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function searchOnSortedList(Request $request, Response $response, array $args)
    {
        $value = $args['value'];
        $value = is_numeric($value) ? (int) $value : $value;
        $result = $this->sortedList->search($value);
        // Return a JSON response
        $msg = $result ? "The value $value exist." : "The value $value doesn't exist.";
        $responseBody = ['message' => $msg];
        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function deleteFromSortedList(Request $request, Response $response, $args) {
        $deleteValue = $args['value'];
        $deleteValue = is_numeric($deleteValue) ? (int) $deleteValue : $deleteValue;
        $res = $this->sortedList->delete($deleteValue);

        $responseBody = [
            'message' => $res ? "Value $deleteValue deleted from the list." : "$deleteValue not found",
            'res' => $res
        ];
        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function traverseSortedList(Request $request, Response $response) {
        $listData = $this->sortedList->traverse();

        $responseBody = [
            'message' => $listData
        ];
        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function unsetSession(Request $request, Response $response)
    {
        $msg = isset($_SESSION['sorted_linked_list_data']) ? 'unset variable' : 'nothing to unset';
        unset($_SESSION['sorted_linked_list_data']);

        $responseBody = [
            'message' => $msg
        ];

        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
