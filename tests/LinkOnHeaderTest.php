<?php
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;



class LinkOnHeaderTest extends TestCase {
    private $client;

    public function setUp(): void {
        $this->client = new Client();
    }

    public function testAccessoryLink() {
        // Define the URL of the Clothing link
        $url = 'https://www.campusstore.rmit.edu.au/collections/accessories';

        // Send an HTTP GET request to the URL
        $response = $this->client->request('GET', $url, ['verify' => false]);

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testStationaryLink() {
        // Define the URL of the Clothing link
        $url = 'https://www.campusstore.rmit.edu.au/collections/stationery';

        // Send an HTTP GET request to the URL
        $response = $this->client->request('GET', $url, ['verify' => false]);

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testCourseLink() {
        // Define the URL of the Clothing link
        $url = 'https://www.campusstore.rmit.edu.au/collections/course';

        // Send an HTTP GET request to the URL
        $response = $this->client->request('GET', $url, ['verify' => false]);

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testSpecialCollectionLink() {
        // Define the URL of the Clothing link
        $url = 'https://www.campusstore.rmit.edu.au/collections/special-collection';

        // Send an HTTP GET request to the URL
        $response = $this->client->request('GET', $url, ['verify' => false]);

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(200, $response->getStatusCode());
    }
    public function testSaleLink() {
        // Define the URL of the Clothing link
        $url = 'https://www.campusstore.rmit.edu.au/collections/sale';

        // Send an HTTP GET request to the URL
        $response = $this->client->request('GET', $url, ['verify' => false]);

        // Assert that the response status code is 200 (OK)
        $this->assertEquals(200, $response->getStatusCode());
    }
}