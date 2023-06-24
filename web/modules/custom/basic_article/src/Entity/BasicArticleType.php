<?php

namespace Drupal\basic_article\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Basic article type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "basic_article_type",
 *   label = @Translation("Basic article type"),
 *   label_collection = @Translation("Basic article types"),
 *   label_singular = @Translation("basic article type"),
 *   label_plural = @Translation("basic articles types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count basic articles type",
 *     plural = "@count basic articles types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\basic_article\Form\BasicArticleTypeForm",
 *       "edit" = "Drupal\basic_article\Form\BasicArticleTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\basic_article\BasicArticleTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer basic article types",
 *   bundle_of = "basic_article",
 *   config_prefix = "basic_article_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/basic_article_types/add",
 *     "edit-form" = "/admin/structure/basic_article_types/manage/{basic_article_type}",
 *     "delete-form" = "/admin/structure/basic_article_types/manage/{basic_article_type}/delete",
 *     "collection" = "/admin/structure/basic_article_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class BasicArticleType extends ConfigEntityBundleBase {

  /**
   * The machine name of this basic article type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the basic article type.
   *
   * @var string
   */
  protected $label;

}
