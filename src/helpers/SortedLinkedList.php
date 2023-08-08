<?php

namespace App\Helpers;
use App\Helpers\Node;

class SortedLinkedList
{
    private $head;

    public function __construct() {
        $this->head = isset($_SESSION['sorted_linked_list_data']) ? unserialize($_SESSION['sorted_linked_list_data']) : null;
        // $this->head = null;
    }

    public function insert($value) {
        $newNode = new Node($value);

        if (!$this->head || $value <= $this->head->data) {
            $newNode->next = $this->head;
            $this->head = $newNode;
            $_SESSION['sorted_linked_list_data'] = serialize($this->head);

            return unserialize($_SESSION['sorted_linked_list_data']);
        }

        $current = $this->head;
        while ($current->next && $value >= $current->next->data) {
            $current = $current->next;
        }

        $newNode->next = $current->next;
        $current->next = $newNode;

        $_SESSION['sorted_linked_list_data'] = serialize($current);

        return unserialize($_SESSION['sorted_linked_list_data']);
    }

    public function delete($value) {
        if (!$this->head) return;

        if ($this->head->data === $value) {
            $this->head = $this->head->next;
            $_SESSION['sorted_linked_list_data'] = serialize($this->head);
            return true;
        }

        $current = $this->head;
        while ($current->next && $current->next->data !== $value) {
            $current = $current->next;
        }

        if ($current->next) {
            $current->next = $current->next->next;
            $_SESSION['sorted_linked_list_data'] = serialize($current);
            return true; // Value found and deleted
        }
    
        return; // Value not found
    }

    public function search($value) {
        $current = $this->head;
        while ($current) {
            if ($current->data === $value) {
                return true;
            }
            $current = $current->next;
        }
        return;
    }

    public function traverse() {
        $current = $this->head;
        $data = [];

        while ($current) {
            $data[] = $current->data;
            $current = $current->next;
        }
        return $data;
    }
}