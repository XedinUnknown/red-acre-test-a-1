<?php

declare(strict_types=1);

if( class_exists(WP_Block_Type::class)){
    return;
}

/**
 * Core class representing a block type.
 *
 * @since 5.0.0
 *
 * @see register_block_type()
 */
class WP_Block_Type
{
    /**
     * Block API version.
     *
     * @since 5.6.0
     * @var int
     */
    public $api_version = 1;
    /**
     * Block type key.
     *
     * @since 5.0.0
     * @var string
     */
    public $name;
    /**
     * Human-readable block type label.
     *
     * @since 5.5.0
     * @var string
     */
    public $title = '';
    /**
     * Block type category classification, used in search interfaces
     * to arrange block types by category.
     *
     * @since 5.5.0
     * @var string|null
     */
    public $category = \null;
    /**
     * Setting parent lets a block require that it is only available
     * when nested within the specified blocks.
     *
     * @since 5.5.0
     * @var array|null
     */
    public $parent = \null;
    /**
     * Block type icon.
     *
     * @since 5.5.0
     * @var string|null
     */
    public $icon = \null;
    /**
     * A detailed block type description.
     *
     * @since 5.5.0
     * @var string
     */
    public $description = '';
    /**
     * Additional keywords to produce block type as result
     * in search interfaces.
     *
     * @since 5.5.0
     * @var array
     */
    public $keywords = array();
    /**
     * The translation textdomain.
     *
     * @since 5.5.0
     * @var string|null
     */
    public $textdomain = \null;
    /**
     * Alternative block styles.
     *
     * @since 5.5.0
     * @var array
     */
    public $styles = array();
    /**
     * Block variations.
     *
     * @since 5.8.0
     * @var array
     */
    public $variations = array();
    /**
     * Supported features.
     *
     * @since 5.5.0
     * @var array|null
     */
    public $supports = \null;
    /**
     * Structured data for the block preview.
     *
     * @since 5.5.0
     * @var array|null
     */
    public $example = \null;
    /**
     * Block type render callback.
     *
     * @since 5.0.0
     * @var callable
     */
    public $render_callback = \null;
    /**
     * Block type attributes property schemas.
     *
     * @since 5.0.0
     * @var array|null
     */
    public $attributes = \null;
    /**
     * Context values inherited by blocks of this type.
     *
     * @since 5.5.0
     * @var array
     */
    public $uses_context = array();
    /**
     * Context provided by blocks of this type.
     *
     * @since 5.5.0
     * @var array|null
     */
    public $provides_context = \null;
    /**
     * Block type editor only script handle.
     *
     * @since 5.0.0
     * @var string|null
     */
    public $editor_script = \null;
    /**
     * Block type front end and editor script handle.
     *
     * @since 5.0.0
     * @var string|null
     */
    public $script = \null;
    /**
     * Block type front end only script handle.
     *
     * @since 5.9.0
     * @var string|null
     */
    public $view_script = \null;
    /**
     * Block type editor only style handle.
     *
     * @since 5.0.0
     * @var string|null
     */
    public $editor_style = \null;
    /**
     * Block type front end and editor style handle.
     *
     * @since 5.0.0
     * @var string|null
     */
    public $style = \null;
    /**
     * Constructor.
     *
     * Will populate object properties from the provided arguments.
     *
     * @since 5.0.0
     * @since 5.5.0 Added the `title`, `category`, `parent`, `icon`, `description`,
     *              `keywords`, `textdomain`, `styles`, `supports`, `example`,
     *              `uses_context`, and `provides_context` properties.
     * @since 5.6.0 Added the `api_version` property.
     * @since 5.8.0 Added the `variations` property.
     * @since 5.9.0 Added the `view_script` property.
     *
     * @see register_block_type()
     *
     * @param string       $block_type Block type name including namespace.
     * @param array|string $args       {
     *     Optional. Array or string of arguments for registering a block type. Any arguments may be defined,
     *     however the ones described below are supported by default. Default empty array.
     *
     *     @type string        $api_version      Block API version.
     *     @type string        $title            Human-readable block type label.
     *     @type string|null   $category         Block type category classification, used in
     *                                           search interfaces to arrange block types by category.
     *     @type array|null    $parent           Setting parent lets a block require that it is only
     *                                           available when nested within the specified blocks.
     *     @type string|null   $icon             Block type icon.
     *     @type string        $description      A detailed block type description.
     *     @type array         $keywords         Additional keywords to produce block type as
     *                                           result in search interfaces.
     *     @type string|null   $textdomain       The translation textdomain.
     *     @type array         $styles           Alternative block styles.
     *     @type array         $variations       Block variations.
     *     @type array|null    $supports         Supported features.
     *     @type array|null    $example          Structured data for the block preview.
     *     @type callable|null $render_callback  Block type render callback.
     *     @type array|null    $attributes       Block type attributes property schemas.
     *     @type array         $uses_context     Context values inherited by blocks of this type.
     *     @type array|null    $provides_context Context provided by blocks of this type.
     *     @type string|null   $editor_script    Block type editor only script handle.
     *     @type string|null   $script           Block type front end and editor script handle.
     *     @type string|null   $view_script      Block type front end only script handle.
     *     @type string|null   $editor_style     Block type editor only style handle.
     *     @type string|null   $style            Block type front end and editor style handle.
     * }
     * @phpstan-param array{
     *   api_version?: string,
     *   title?: string,
     *   category?: string|null,
     *   parent?: array|null,
     *   icon?: string|null,
     *   description?: string,
     *   keywords?: array,
     *   textdomain?: string|null,
     *   styles?: array,
     *   variations?: array,
     *   supports?: array|null,
     *   example?: array|null,
     *   render_callback?: callable|null,
     *   attributes?: array|null,
     *   uses_context?: array,
     *   provides_context?: array|null,
     *   editor_script?: string|null,
     *   script?: string|null,
     *   view_script?: string|null,
     *   editor_style?: string|null,
     *   style?: string|null,
     * } $args
     */
    public function __construct($block_type, $args = array())
    {
    }
    /**
     * Renders the block type output for given attributes.
     *
     * @since 5.0.0
     *
     * @param array  $attributes Optional. Block attributes. Default empty array.
     * @param string $content    Optional. Block content. Default empty string.
     * @return string Rendered block type output.
     */
    public function render($attributes = array(), $content = '')
    {
    }
    /**
     * Returns true if the block type is dynamic, or false otherwise. A dynamic
     * block is one which defers its rendering to occur on-demand at runtime.
     *
     * @since 5.0.0
     *
     * @return bool Whether block type is dynamic.
     */
    public function is_dynamic()
    {
    }
    /**
     * Validates attributes against the current block schema, populating
     * defaulted and missing values.
     *
     * @since 5.0.0
     *
     * @param array $attributes Original block attributes.
     * @return array Prepared block attributes.
     */
    public function prepare_attributes_for_render($attributes)
    {
    }
    /**
     * Sets block type properties.
     *
     * @since 5.0.0
     *
     * @param array|string $args Array or string of arguments for registering a block type.
     *                           See WP_Block_Type::__construct() for information on accepted arguments.
     * @phpstan-param array{
     *   api_version?: string,
     *   title?: string,
     *   category?: string|null,
     *   parent?: array|null,
     *   icon?: string|null,
     *   description?: string,
     *   keywords?: array,
     *   textdomain?: string|null,
     *   styles?: array,
     *   variations?: array,
     *   supports?: array|null,
     *   example?: array|null,
     *   render_callback?: callable|null,
     *   attributes?: array|null,
     *   uses_context?: array,
     *   provides_context?: array|null,
     *   editor_script?: string|null,
     *   script?: string|null,
     *   view_script?: string|null,
     *   editor_style?: string|null,
     *   style?: string|null,
     * } $args See WP_Block_Type::__construct()
     */
    public function set_props($args)
    {
    }
    /**
     * Get all available block attributes including possible layout attribute from Columns block.
     *
     * @since 5.0.0
     *
     * @return array Array of attributes.
     */
    public function get_attributes()
    {
    }
}
