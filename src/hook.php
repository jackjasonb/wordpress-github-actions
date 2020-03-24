<?php

function push_repository_dispatch_event($post_id, $post)
{
    if ($post->post_status === 'publish') {
        $data = "'{" . '"event_type": "' . esc_attr(get_option('github_event_type')) . '"}' . "'";
        $url = 'https://api.github.com/repos/' . esc_attr(get_option('github_account')) . '/' . esc_attr(get_option('github_repository')) . '/dispatches';
        $token = esc_attr(get_option('github_token'));

        exec("curl -H \"Authorization: token ${token}\" -H \"Accept: application/vnd.github.everest-preview+json\" \"${url}\" -d ${data}");
    }
}

function nb_webhook_future_post($post_id)
{
    push_repository_dispatch_event($post_id, get_post($post_id));
}

function nb_webhook_update($post_id, $post_after, $post_before)
{
    push_repository_dispatch_event($post_id, $post_after);
}

add_action('publish_future_post', 'nb_webhook_future_post', 10);
add_action('publish_post', 'push_repository_dispatch_event', 10, 2);
add_action('publish_page', 'push_repository_dispatch_event', 10, 2);
add_action('post_updated', 'nb_webhook_update', 10, 3);
// add_action('delete_post', 'push_repository_dispatch_event', 10, 1);
