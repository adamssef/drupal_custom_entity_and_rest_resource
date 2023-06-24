<?php

namespace Drupal\basic_article;

/**
 * Defines an interface for basic article entities.
 */
interface ExtendedArticleInterface {

  /**
   * Returns the article id.
   *
   * @return int
   *   The article id.
   */
  public function getArticleId(): int;

  /**
   * Returns the description.
   *
   * @return string
   *   The description.
   */
  public function getArticleDescription(): string;

  /**
   * Returns the path.
   *
   * @return string
   *   The path.
   */
  public function getArticlePath(): string;

  /**
   * Sets the description.
   *
   * @param string $description
   *   The description.
   */
  public function setArticleDescription(string $description): void;

  /**
   * Returns the article title.
   *
   * @return string
   *   The article title.
   */
  public function getArticleTitle(): string;

  /**
   * Sets the article title.
   *
   * @param string $title
   *   The article title.
   */
  public function setArticleTitle(string $title): void;

  /**
   * Returns the link for an article.
   *
   * @return string|null
   *   The link for an article.
   */
  public function getArticleImage(): ?string;

  /**
   * Return array of article objects.
   *
   * @return array
   *   The link for an article.
   */
  public function getArticles(): array;

}
