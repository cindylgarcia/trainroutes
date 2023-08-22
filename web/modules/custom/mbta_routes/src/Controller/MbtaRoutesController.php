<?php

namespace Drupal\mbta_routes\Controller;

use Drupal\Core\Controller\ControllerBase;
use GuzzleHttp\ClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Controller for MBTA Routes.
 *
 * @package Drupal\mbta_routes\Controller
 *
 *
 * */

class MbtaRoutesController extends ControllerBase {

  /**
   * Guzzle\Client instance for making HTTP requests to MBTA API.
   *
   * @var \GuzzleHttp\ClientInterface
   *
   *
   * */


  protected $httpClient;

  /**
   * {@inheritdoc}
   *
   *
   * */

  public function __construct(ClientInterface $http_client) {
    $this->httpClient = $http_client;

}

  /**
   * {@inheritdoc}
   *
   *
   * */

  public static function create(ContainerInterface $container) {
    return new static(
         $container->get('http_client')
       );
  }

  /**
   * {@inheritdoc}
   *
   *  @return array
   *   returns a render array for the MBTA Routes table.
   *
   * */
  public function build() {
    $request = $this->httpClient->request('GET', 'https://api-v3.mbta.com/routes?filter[type]=0,1');
    $response = json_decode($request->getBody()->getContents());

    $rows = [];


    foreach ($response->data as $route) {
      $color = $route->attributes->color;
      $text_color = $route->attributes->text_color;



      $rows[] = [
            'id' => $route->id,
            'name' => ['markup' => $text_color],
            'color' => ['#markup' => 'background-color: ' . $color . '; color: ' . $text_color . ';'],
        ];
    }
    $header = [
        'id' => 'ID',
        'name' => 'Name',
        'color' => 'Color',
    ];

    return [
        'table' => [
            '#theme' => 'table',
            '#header' => $header,
            '#rows' => $rows,
        ],
    ];
}

  }
