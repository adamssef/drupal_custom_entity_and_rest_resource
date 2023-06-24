<?php

namespace Drupal\basic_article;

use Drupal\basic_article\Entity\BasicArticle;


/**
 * This is just an example class.
 *
 * It can be useful however to encapsulate business logic using bundle classes.
 *
 * @package Drupal\basic_article
 */
class ExtendedArticle extends BasicArticle implements ExtendedArticleInterface {

  /**
   * Returns the article id.
   *
   * @return int
   *   The article id.
   */
  public function getArticleId(): int {
    return $this->id();
  }

  /**
   * Returns the description.
   *
   * @return string
   *   The description.
   */
  public function getArticleDescription(): string {
    return strip_tags($this->get('description')->value);
  }

  /**
   * Returns the path to the article.
   *
   * @return string
   *   The path.
   */
  public function getArticlePath(): string {
    $url = \Drupal::request()->getSchemeAndHttpHost();

    return implode('/', [$url, 'node', $this->id()]);
  }

  /**
   * Sets the description.
   *
   * @param string $description
   *   The description.
   */
  public function setArticleDescription(string $description): void {
    // @todo Implement setArticleDescription() method.
  }

  /**
   * Returns the article title.
   *
   * @return string
   *   The article title.
   */
  public function getArticleTitle(): string {
    return $this->get('label')->value;
  }

  /**
   * Sets the article title.
   *
   * @param string $title
   *   The article title.
   */
  public function setArticleTitle(string $title): void {
    // @todo Implement setArticleTitle() method.
  }

  /**
   * Returns the link for an article.
   *
   * @return string|null
   *   The link to the article or NULL.
   */
  public function getArticleImage(): ?string {
    if ($this->get('field_image') === NULL) {
      return NULL;
    }

    return $this->get('field_image')?->entity?->getFileUri();
  }


  public function getArticles(): array {
    // TODO: Implement getArticles() method.
  }
}
