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
   *   A simple renderable array.
   *
   * */
  public function build() {
    $request = $this->httpClient->request('GET', 'https://api-v3.mbta.com/routes?filter[type]=0,1');
    $response = json_decode($request->getBody()->getContents());

    $rows = [];

    foreach ($response->data as $route) {
      $color = $route->attributes->color;

      $rows[] = [
        'data' => [
          $route->attributes->long_name,
        ],
        'style' => 'background-color: #' . $color . '; color: #fff;',
      ];

    }

    $build = [
      '#type' => 'table',
      '#header' => ['Route'],
      '#rows' => $rows,
    ];

    return $build;

  }

}
