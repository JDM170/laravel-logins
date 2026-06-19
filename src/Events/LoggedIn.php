<?php

namespace JDM170\Logins\Events;

use JDM170\Logins\RequestContext;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;

class LoggedIn
{
    use SerializesModels;

    public function __construct(

        /**
         * The authenticated model.
         */
        public Authenticatable $authenticatable,

        /**
         * Information about the request (user agent, ip address...).
         */
        public RequestContext $context
    ) {}
}
