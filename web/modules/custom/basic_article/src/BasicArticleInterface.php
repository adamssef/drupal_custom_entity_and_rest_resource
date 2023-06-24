<?php

namespace Drupal\basic_article;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a basic article entity type.
 */
interface BasicArticleInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
