<?php
function github_actions_settings_page()
{
    if (true == $_GET['settings-updated']) { ?>
        <div id="settings_updated" class="updated notice is-dismissible">
            <p><strong>設定を保存しました。</strong></p>
        </div>
    <?php } ?>

    <div class="wrap">
        <h2>設定</h2>
        <form method="post" action="options.php">
            <?php settings_fields('github-actions-settings'); ?>
            <?php do_settings_sections('github-actions-settings'); ?>
            <table class="form-table">
                <tr>
                    <th>Github アカウント</th>
                    <td><input type="text" name="github_account" id="github_account" value="<?= esc_attr(get_option('github_account')); ?>" required="required"></td>
                </tr>
                <tr>
                    <th>リポジトリ名</th>
                    <td><input type="text" name="github_repository" id="github_repository" value="<?= esc_attr(get_option('github_repository')); ?>" required="required"></td>
                </tr>
                <tr>
                    <th>Personal access tokens</th>
                    <td><input type="password" name="github_token" id="github_token" value="<?= esc_attr(get_option('github_token')); ?>" required="required"></td>
                </tr>
                <tr>
                    <th>Event type</th>
                    <td><input type="password" name="github_event_type" id="github_event_type" value="<?= esc_attr(get_option('github_event_type')); ?>" required="required"></td>
                </tr>
            </table>
            <?php submit_button('設定を保存', 'primary large', 'submit', true, array('tabindex' => '1')); ?>
        </form>
        <div id="pluginurl" data-pluginurl="<?= esc_attr(plugins_url()); ?>"></div>
    </div>

<?php } ?>