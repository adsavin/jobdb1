<?php

/**
 * The widget to create a search form for news and announcement.
 * It render 'searchform' as a view
 * @author aphisith
 *
 */
class RequireMessageWidget extends CWidget {
    public function run() {
        $this->render('requiremessage');
    }
}
