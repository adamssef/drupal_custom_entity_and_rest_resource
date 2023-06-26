<?php

namespace Drupal\mini_rest\Plugin\rest\resource;

use Drupal\basic_article\Article;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Psr\Log\LoggerInterface;
use \Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a Mini Rest Resource.
 *
 * @RestResource(
 *   id = "mini_rest_plugin",
 *   label = @Translation("Mini Rest"),
 *   uri_paths = {
 *     "canonical" = "/mini_rest/articles",
 *   }
 * )
 */
class MiniRestResource extends ResourceBase {

  /**
   * The available serialization formats.
   *
   * @var array
   */
  protected $serializerFormats = [];

  /**
   * A logger instance.
   *
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Create an instance of ExtendedArticle.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.\
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param array $serializer_formats
   *   The available serialization formats.
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   *  The parent constructor arguments.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, array $serializer_formats, LoggerInterface $logger, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $serializer_formats, $logger);
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->getParameter('serializer.formats'),
      $container->get('logger.factory')->get('rest'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * Responds to entity GET requests.
   *
   * @return \Drupal\rest\ResourceResponse
   *   The response.
   */
  public function get() {
    $articles = $this->entityTypeManager->getStorage('node')->loadByProperties(['type' => 'article']);
    $response_content = [];

    foreach ($articles as $article) {
      $item_to_be_returned = [];
      if ($article instanceof Article) {
        // Clearly - more complex logic can be implemented in below methods.
        $item_to_be_returned['id'] = $article->getArticleId();
        $item_to_be_returned['description'] = $article->get('body')->value;
        $item_to_be_returned['path'] = $article->getArticlePath();
        $item_to_be_returned['title'] = $article->getArticleTitle();
        $item_to_be_returned['image'] = $article->getArticleImage();
        $item_to_be_returned['bundle'] = $article->bundle();
        $response_content[] = $item_to_be_returned;
      }
    }

    $response = new ResourceResponse($response_content);

    foreach ($articles as $article) {
      $response->addCacheableDependency($article);
    }

    return $response;
  }

}
