<?php
function create_menu() {
    add_options_page( 'Github Actions', 'Github Actions', 'administrator', 'github_actions_setting', 'github_actions_settings_page');
    add_action( 'admin_init', 'github_actions_register_settings' );
}

add_action( 'admin_menu', 'create_menu' );

function github_actions_register_settings() {
    register_setting( 'github-actions-settings', 'github_account' );
    register_setting( 'github-actions-settings', 'github_repository' );
    register_setting( 'github-actions-settings', 'github_token' );
    register_setting( 'github-actions-settings', 'github_event_type');
}
