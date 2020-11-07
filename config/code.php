<?php

return [
    'user' => [
        'email_exists' => 701,
        'invalid_credentials' => 702,
        'login_email_failed' => 703,
        'login_facebook_failed' => 704,
        'login_twitter_failed' => 705,
        'user_not_found' => 706,
        'email_not_exists' => 707,
        'user_not_found'=> 708
    ],
    'admin' => [
        'email_exists' => 701,
        'invalid_credentials' => 702,
        'login_email_failed' => 703,
        'login_facebook_failed' => 704,
        'login_twitter_failed' => 705,
        'user_not_found' => 706,
        'email_not_exists' => 707,
        'admin_not_found'=> 708
    ],
    'common' => [
        'status_code_success' => 200,
        'system_error' => -1,
        'request_success' => 0,
        'request_error' => 1,
        'validate_failed' => 2,
        'create_failed' => 3,
        'update_failed' => 4,
        'delete_failed' => 5,
        'activate_failed' => 6,
        'get_failed' => 7,
        'update_success' => 8,
        'download_fail' => 9,
    ],

    'auth' => [
        'invalid_credentials' => 11,
        'token_absent' => 12,
        'token_expired' => 13,
        'token_blacklisted' => 14,
        'token_invalid' => 15,
        'email_not_verified_yet' => 16,
        'referal_code_not_exist' => 18,
        'token_activation_expired' => 19,
        'token_activated' => 21,
        'new_password_not_change' => 22,
        'wrong_activation_code' => 20,
    ],
    'gmo' => [
        'redirect_to_charge' => 30,
    ],
];
