<?php

namespace App;

use Illuminate\Contracts\Container\Container as ContainerContract;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Config;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Sage config
     */
    $paths = [
        'dir.stylesheet' => get_stylesheet_directory(),
        'dir.template'   => get_template_directory(),
        'dir.upload'     => wp_upload_dir()['basedir'],
        'uri.stylesheet' => get_stylesheet_directory_uri(),
        'uri.template'   => get_template_directory_uri(),
    ];
    $viewPaths = collect(preg_replace('%[\/]?(resources/views)?[\/.]*?$%', '', [STYLESHEETPATH, TEMPLATEPATH]))
        ->flatMap(function ($path) {
            return ["{$path}/resources/views", $path];
        })->unique()->toArray();

    config([
        'assets.manifest' => "{$paths['dir.stylesheet']}/../dist/assets.json",
        'assets.uri'      => "{$paths['uri.stylesheet']}/dist",
        'view.compiled'   => "{$paths['dir.upload']}/cache/compiled",
        'view.namespaces' => ['App' => WP_CONTENT_DIR],
        'view.paths'      => $viewPaths,
    ] + $paths);

    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (ContainerContract $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view'], $app);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= App\\asset_path({$asset}); ?>";
    });
});

/**
 * Init config
 */
sage()->bindIf('config', Config::class, true);


add_action('init', function() {

    /**
     * meetup_group CPT
     */
    $labels = array(
      'name'                => _x( 'Meetup Groups', 'Post Type General Name', 'tech-community' ),
      'singular_name'       => _x( 'Meetup Group', 'Post Type Singular Name', 'tech-community' ),
      'menu_name'           => __( 'Meetup Groups', 'tech-community' ),
      'parent_item_colon'   => __( 'Parent Meetup Group:', 'tech-community' ),
      'all_items'           => __( 'Meetup Groups', 'tech-community' ),
      'view_item'           => __( 'View Meetup Group', 'tech-community' ),
      'add_new_item'        => __( 'Add New Meetup Group', 'tech-community' ),
      'add_new'             => __( 'Add New', 'tech-community' ),
      'edit_item'           => __( 'Edit Meetup Group', 'tech-community' ),
      'update_item'         => __( 'Update Meetup Group', 'tech-community' ),
      'search_items'        => __( 'Search Meetup Groups', 'tech-community' ),
      'not_found'           => __( 'Not found', 'tech-community' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'tech-community' ),
    );

    $args = array(
      'label'               => $labels['name'],
      'description'         => __( 'Tech-specific meetup groups that exist in Northeast Ohio', 'tech-community' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes', ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'rewrite'             => array( 'slug' => 'meetup-groups', 'with_front' => FALSE ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'show_in_rest'        => true,
      'rest_base'           => 'meetup-groups',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'map_meta_cap'        => true,
      'capability_type'     => 'post',
    );

    register_post_type( 'meetup_group', $args );

    /**
     * Workspace CPT
     */
    $labels = array(
      'name'                => _x( 'Workspaces', 'Post Type General Name', 'tech-community' ),
      'singular_name'       => _x( 'Workspace', 'Post Type Singular Name', 'tech-community' ),
      'menu_name'           => __( 'Workspaces', 'tech-community' ),
      'parent_item_colon'   => __( 'Parent Workspace:', 'tech-community' ),
      'all_items'           => __( 'Workspaces', 'tech-community' ),
      'view_item'           => __( 'View Workspace', 'tech-community' ),
      'add_new_item'        => __( 'Add New Workspace', 'tech-community' ),
      'add_new'             => __( 'Add New', 'tech-community' ),
      'edit_item'           => __( 'Edit Workspace', 'tech-community' ),
      'update_item'         => __( 'Update Workspace', 'tech-community' ),
      'search_items'        => __( 'Search Workspaces', 'tech-community' ),
      'not_found'           => __( 'Not found', 'tech-community' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'tech-community' ),
    );

    $args = array(
      'label'               => $labels['name'],
      'description'         => __( 'Workspaces in Northeast Ohio', 'tech-community' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes', ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'rewrite'             => array( 'slug' => 'workspaces', 'with_front' => FALSE ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'show_in_rest'        => true,
      'rest_base'           => 'workspaces',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'map_meta_cap'        => true,
      'capability_type'     => 'post',
    );

    register_post_type( 'workspace', $args );


    /**
     * sponsor CPT
     */
    $labels = array(
      'name'                => _x( 'Sponsors', 'Post Type General Name', 'tech-community' ),
      'singular_name'       => _x( 'Sponsor', 'Post Type Singular Name', 'tech-community' ),
      'menu_name'           => __( 'Sponsors', 'tech-community' ),
      'parent_item_colon'   => __( 'Parent Sponsor:', 'tech-community' ),
      'all_items'           => __( 'Sponsors', 'tech-community' ),
      'view_item'           => __( 'View Sponsor', 'tech-community' ),
      'add_new_item'        => __( 'Add New Sponsor', 'tech-community' ),
      'add_new'             => __( 'Add New', 'tech-community' ),
      'edit_item'           => __( 'Edit Sponsor', 'tech-community' ),
      'update_item'         => __( 'Update Sponsor', 'tech-community' ),
      'search_items'        => __( 'Search Sponsors', 'tech-community' ),
      'not_found'           => __( 'Not found', 'tech-community' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'tech-community' ),
    );

    $args = array(
      'label'               => $labels['name'],
      'description'         => __( 'Companies and individuals that sponsor Code Cleveland.', 'tech-community' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes', ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'rewrite'             => array( 'slug' => 'sponsors', 'with_front' => FALSE ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'show_in_rest'        => true,
      'rest_base'           => 'sponsors',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'map_meta_cap'        => true,
      'capability_type'     => 'post',
    );

    register_post_type( 'sponsor', $args );

    /**
     * job CPT
     *
    $labels = array(
      'name'                => _x( 'Jobs', 'Post Type General Name', 'tech-community' ),
      'singular_name'       => _x( 'Job', 'Post Type Singular Name', 'tech-community' ),
      'menu_name'           => __( 'Jobs', 'tech-community' ),
      'parent_item_colon'   => __( 'Parent Job:', 'tech-community' ),
      'all_items'           => __( 'Jobs', 'tech-community' ),
      'view_item'           => __( 'View Job', 'tech-community' ),
      'add_new_item'        => __( 'Add New Job', 'tech-community' ),
      'add_new'             => __( 'Add New', 'tech-community' ),
      'edit_item'           => __( 'Edit Job', 'tech-community' ),
      'update_item'         => __( 'Update Job', 'tech-community' ),
      'search_items'        => __( 'Search Jobs', 'tech-community' ),
      'not_found'           => __( 'Not found', 'tech-community' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'tech-community' ),
    );

    $args = array(
      'label'               => $labels['name'],
      'description'         => __( 'Companies and individuals that are hiring in Cleveland.', 'tech-community' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes', ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'rewrite'             => array( 'slug' => 'jobs', 'with_front' => FALSE ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'show_in_rest'        => true,
      'rest_base'           => 'jobs',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'map_meta_cap'        => true,
      'capability_type'     => 'post',
    );

    register_post_type( 'job', $args );

    */

    /**
     * event CPT
     *
    $labels = array(
      'name'                => _x( 'Events', 'Post Type General Name', 'tech-community' ),
      'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'tech-community' ),
      'menu_name'           => __( 'Events', 'tech-community' ),
      'parent_item_colon'   => __( 'Parent Event:', 'tech-community' ),
      'all_items'           => __( 'Events', 'tech-community' ),
      'view_item'           => __( 'View Event', 'tech-community' ),
      'add_new_item'        => __( 'Add New Event', 'tech-community' ),
      'add_new'             => __( 'Add New', 'tech-community' ),
      'edit_item'           => __( 'Edit Event', 'tech-community' ),
      'update_item'         => __( 'Update Event', 'tech-community' ),
      'search_items'        => __( 'Search Events', 'tech-community' ),
      'not_found'           => __( 'Not found', 'tech-community' ),
      'not_found_in_trash'  => __( 'Not found in Trash', 'tech-community' ),
    );

    $args = array(
      'label'               => $labels['name'],
      'description'         => __( 'Tech-specific events that are happening in Northeast Ohio', 'tech-community' ),
      'labels'              => $labels,
      'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes', ),
      'taxonomies'          => array( 'category', 'post_tag' ),
      'rewrite'             => array( 'slug' => 'events', 'with_front' => FALSE ),
      'hierarchical'        => true,
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'show_in_rest'        => true,
      'rest_base'           => 'events',
      'can_export'          => true,
      'has_archive'         => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'map_meta_cap'        => true,
      'capability_type'     => 'post',
    );

    register_post_type( 'event', $args );
    */

});