<?php

/**
 * @file
 * Contains \Drupal\Core\Menu\MenuTreeParameters.
 */

namespace Drupal\Core\Menu;

/**
 * Provides a value object to model menu tree parameters.
 *
 * Menu tree parameters are used to determine the set of definitions to be
 * loaded from \Drupal\Core\Menu\MenuTreeStorageInterface. Hence they determine
 * the shape and content of the tree:
 * - which parent IDs should be used to restrict the tree, i.e. only links with
 *   a parent in the list will be included.
 * - which menu links are omitted, i.e. minimum and maximum depth.
 *
 * @todo Add getter methods and make all properties protected and define an
 *   interface instead of using the concrete class to type hint.
 *   https://www.drupal.org/node/2302041
 */
class MenuTreeParameters {

  /**
   * A menu link plugin ID that should be used as the root.
   *
   * By default the root ID of empty string '' is used. However, when only the
   * descendants (subtree) of a certain menu link are needed, a custom root can
   * be specified.
   *
   * @var string
   */
  public $root = '';

  /**
   * The minimum depth of menu links in the resulting tree relative to the root.
   *
   * Defaults to 1, which is the default to build a whole tree for a menu
   * (excluding the root).
   *
   * @var int|null
   */
  public $minDepth = NULL;

  /**
   * The maximum depth of menu links in the resulting tree relative to the root.
   *
   * @var int|null
   */
  public $maxDepth = NULL;

  /**
   * An array of parent link IDs.
   *
   * This restricts the tree to only menu links that are at the top level or
   * have a parent ID in this list. If empty, the whole menu tree is built.
   *
   * @var string[]
   */
  public $expandedParents = array();

  /**
   * The IDs from the currently active menu link to the root of the whole tree.
   *
   * This is an array of menu link plugin IDs, representing the trail from the
   * currently active menu link to the ("real") root of that menu link's menu.
   * This does not affect the way the tree is built, it only is used to set the
   * value of the inActiveTrail property for each tree element.
   *
   * @var string[]
   */
  public $activeTrail = array();

  /**
   * The conditions used to restrict which links are loaded.
   *
   * An associative array of custom query condition key/value pairs.
   *
   * @var array
   */
  public $conditions = array();

  /**
   * Sets a root; loads a menu tree with this menu link plugin ID as root.
   *
   * @param string $root
   *   A menu link plugin ID, or empty string '' to use the root of the whole
   *   tree.
   *
   * @return $this
   *
   * @codeCoverageIgnore
   */
  public function setRoot($root) {
    $this->root = (string) $root;
    return $this;
  }

  /**
   * Sets a minimum depth; loads a menu tree from the given level.
   *
   * @param int $min_depth
   *   The (root-relative) minimum depth to apply.
   *
   * @return $this
   */
  public function setMinDepth($min_depth) {
    $this->minDepth = max(1, $min_depth);
    return $this;
  }

  /**
   * Sets a minimum depth; loads a menu tree up to the given level.
   *
   * @param int $max_depth
   *   The (root-relative) maximum depth to apply.
   *
   * @return $this
   *
   * @codeCoverageIgnore
   */
  public function setMaxDepth($max_depth) {
    $this->maxDepth = $max_depth;
    return $this;
  }

  /**
   * Adds parent menu links IDs to restrict the tree (only show children).
   *
   * @param string[] $parents
   *   An array containing the parent IDs to limit the tree.
   *
   * @return $this
   */
  public function addExpandedParents(array $parents) {
    $this->expandedParents = array_merge($this->expandedParents, $parents);
    $this->expandedParents = array_unique($this->expandedParents);
    return $this;
  }

  /**
   * Sets the active trail IDs used to set the inActiveTrail property.
   *
   * @param string[] $active_trail
   *   An array containing the active trail: a list of menu link plugin IDs.
   *
   * @return $this
   *
   * @see \Drupal\Core\Menu\MenuActiveTrail::getActiveTrailIds()
   *
   * @codeCoverageIgnore
   */
  public function setActiveTrail(array $active_trail) {
    $this->activeTrail = $active_trail;
    return $this;
  }

  /**
   * Adds a custom query condition.
   *
   * @param string $definition_field
   *   Only conditions that are testing menu link definition fields are allowed.
   * @param mixed $value
   *   The value to test the link definition field against. In most cases, this
   *   is a scalar. For more complex options, it is an array. The meaning of
   *   each element in the array is dependent on the $operator.
   * @param string|null $operator
   *   (optional) The comparison operator, such as =, <, or >=. It also accepts
   *   more complex options such as IN, LIKE, or BETWEEN. If NULL, defaults to
   *   the = operator.
   *
   * @return $this
   */
  public function addCondition($definition_field, $value, $operator = NULL) {
    if (!isset($operator)) {
      $this->conditions[$definition_field] = $value;
    }
    else {
      $this->conditions[$definition_field] = array($value, $operator);
    }
    return $this;
  }

  /**
   * Excludes links that are not enabled.
   *
   * @return $this
   */
  public function onlyEnabledLinks() {
    $this->addCondition('enabled', 1);
    return $this;
  }

  /**
   * Ensures only the top level of the tree is loaded.
   *
   * @return $this
   */
  public function setTopLevelOnly() {
    $this->setMaxDepth(1);
    return $this;
  }

  /**
   * Excludes the root menu link from the tree.
   *
   * Note that this is only necessary when you specified a custom root, because
   * the normal root ID is the empty string, '', which does not correspond to an
   * actual menu link. Hence when loading a menu link tree without specifying a
   * custom root the tree will start at the children even if this method has not
   * been called.
   *
   * @return $this
   */
  public function excludeRoot() {
    $this->setMinDepth(1);
    return $this;
  }

}
