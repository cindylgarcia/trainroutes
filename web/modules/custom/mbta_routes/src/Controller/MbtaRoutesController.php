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
 */

class MbtaRoutesController extends ControllerBase {

  /**
   * Guzzle\Client instance for making HTTP requests to MBTA API.
   *
   * @var \GuzzleHttp\ClientInterface
   */

  protected $httpClient;

  /**
   * {@inheritdoc}
   */

  public function __construct(ClientInterface $http_client) {
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('http_client')
    );
  }

  /**
   * {@inheritdoc}
   *
   * @return array
   *   A simple renderable array.
   */

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
      '#header' => ['Rapid Transit'],
      '#rows' => $rows,
    ];

    return $build;
  }

/**
   * Displays the scheduling for a specific route.
   *
   * @param string $route
   *   The route ID.
   *
   * @return array
   *   A renderable array.
   */
  public function schedulePage($route) {
    $request = $this->httpClient->request('GET', 'https://api-v3.mbta.com/schedules?filter[route]=' . $route);
    $response = json_decode($request->getBody()->getContents());

    $scheduleData = [];

    foreach ($response->data as $schedule) {
      $scheduleData[] = [
        $schedule->relationships->route->data->id,
        $schedule->attributes->arrival_time,
        $schedule->attributes->departure_time,
      ];

    }

    $build = [
      '#type' => 'table',
      '#header' => ['Trip ID', 'Arrival Time', 'Departure Time'],
      '#rows' => $scheduleData,
    ];

    return $build;

  }

}
