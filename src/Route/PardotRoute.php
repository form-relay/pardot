<?php

namespace FormRelay\Pardot\Route;

use FormRelay\Core\DataDispatcher\DataDispatcherInterface;
use FormRelay\Core\Model\Submission\SubmissionConfigurationInterface;
use FormRelay\Request\DataDispatcher\RequestDataDispatcher;
use FormRelay\Request\Route\RequestRoute;

class PardotRoute extends RequestRoute
{
    const KEY_SEND_VISITOR_COOKIES = 'sendVisitorCookies';
    const DEFAULT_SEND_VISITOR_COOKIES = true;

    protected function getVisitorCookies(): array
    {
        $cookies = [];
        foreach ($this->request->getCookies() as $cookieName => $cookieValue) {
            if (preg_match('/^visitor_id[0-9]+(-hash)?$/', $cookieName)) {
                $cookies[$cookieName] = $cookieValue;
            }
        }
        return $cookies;
    }

    protected function getDispatcher(): DataDispatcherInterface
    {
        /** @var RequestDataDispatcher $dispatcher */
        $dispatcher = parent::getDispatcher();
        if ($this->getConfig(static::KEY_SEND_VISITOR_COOKIES, static::DEFAULT_SEND_VISITOR_COOKIES)) {
            $cookies = $this->getVisitorCookies();
            $dispatcher->addCookies($cookies);
        }
        return $dispatcher;
    }

    public static function getDefaultConfiguration(): array
    {
        return parent::getDefaultConfiguration() + [
            static::KEY_SEND_VISITOR_COOKIES => static::DEFAULT_SEND_VISITOR_COOKIES,
            'fields' => [
                'mapping' => [
                    'source' => 'source',

                    'salutation' => 'salutation',
                    'first_name' => 'first_name',
                    'last_name' => 'last_name',

                    'email' => 'email',
                    'phone' => 'phone',
                    'fax' => 'fax',

                    'company' => 'company',
                    'industry' => 'industry',
                    'department' => 'department',
                    'job_title' => 'job_title',
                    'website' => 'website',
                    'annual_revenue' => 'annual_revenue',
                    'years_in_business' => 'years_in_business',
                    'employees' => 'employees',

                    'address_one' => 'address_one',
                    'address_two' => 'address_two',
                    'zip' => 'zip',
                    'city' => 'city',
                    'state' => 'state',
                    'country' => 'country',
                    'territory' => 'territory',

                    'is_do_not_call' => 'is_do_not_call',
                    'is_do_not_email' => 'is_do_not_email',
                    'opted_out' => 'opted_out',
                ],
                'unmapped' => [
                    SubmissionConfigurationInterface::KEY_SELF => 'comments',
                    'appendKeyValue' => true,
                ],
            ],
        ];
    }
}
