<?php

namespace FormRelay\Pardot\Route;

use FormRelay\Core\DataDispatcher\DataDispatcherInterface;
use FormRelay\Core\Model\Submission\Submission;
use FormRelay\Core\Model\Submission\SubmissionConfigurationInterface;
use FormRelay\Core\Model\Submission\SubmissionInterface;
use FormRelay\Request\DataDispatcher\RequestDataDispatcher;
use FormRelay\Request\Route\RequestRoute;

class PardotRoute extends RequestRoute
{
    const DEFAULT_COOKIES = ['visitor_id[0-9]+(-hash)?'];

    const DEFAULT_FIELDS = [
        'source' => ['field' => 'source'],

        'salutation' => ['field' => 'salutation'],
        'first_name' => ['field' => 'first_name'],
        'last_name' => ['field' => 'last_name'],

        'email' => ['field' => 'email'],
        'phone' => ['field' => 'phone'],
        'fax' => ['field' => 'fax'],

        'company' => ['field' => 'company'],
        'industry' => ['field' => 'industry'],
        'department' => ['field' => 'department'],
        'job_title' => ['field' => 'job_title'],
        'website' => ['field' => 'website'],
        'annual_revenue' => ['field' => 'annual_revenue'],
        'years_in_business' => ['field' => 'years_in_business'],
        'employees' => ['field' => 'employees'],

        'address_one' => ['field' => 'address_one'],
        'address_two' => ['field' => 'address_two'],
        'zip' => ['field' => 'zip'],
        'city' => ['field' => 'city'],
        'state' => ['field' => 'state'],
        'country' => ['field' => 'country'],
        'territory' => ['field' => 'territory'],

        'is_do_not_call' => ['field' => 'is_do_not_call'],
        'is_do_not_email' => ['field' => 'is_do_not_email'],
        'opted_out' => ['field' => 'opted_out'],
        'comments' => [
            'fieldCollector' => [
                'exclude' => '',
                'ignoreIfEmpty' => true,
                'unprocessedOnly' => true,
            ],
        ],
    ];
}
