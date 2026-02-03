<?php

declare(strict_types=1);

namespace ModerationAPI;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use ModerationAPI\Core\BaseClient;
use ModerationAPI\Core\Util;
use ModerationAPI\Services\AccountService;
use ModerationAPI\Services\ActionsService;
use ModerationAPI\Services\AuthorsService;
use ModerationAPI\Services\AuthService;
use ModerationAPI\Services\ContentService;
use ModerationAPI\Services\QueueService;
use ModerationAPI\Services\WordlistService;

/**
 * @phpstan-import-type NormalizedRequest from \ModerationAPI\Core\BaseClient
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
class Client extends BaseClient
{
    public string $secretKey;

    /**
     * @api
     */
    public AuthorsService $authors;

    /**
     * @api
     */
    public QueueService $queue;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @api
     */
    public ContentService $content;

    /**
     * @api
     */
    public AccountService $account;

    /**
     * @api
     */
    public AuthService $auth;

    /**
     * @api
     */
    public WordlistService $wordlist;

    /**
     * @param RequestOpts|null $requestOptions
     */
    public function __construct(
        ?string $secretKey = null,
        ?string $baseUrl = null,
        RequestOptions|array|null $requestOptions = null,
    ) {
        $this->secretKey = (string) ($secretKey ?? Util::getenv(
            'MODAPI_SECRET_KEY'
        ));

        $baseUrl ??= Util::getenv(
            'MODERATION_API_BASE_URL'
        ) ?: 'https://api.moderationapi.com/v1';

        $options = RequestOptions::parse(
            RequestOptions::with(
                uriFactory: Psr17FactoryDiscovery::findUriFactory(),
                streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
                requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
                transporter: Psr18ClientDiscovery::find(),
            ),
            $requestOptions,
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('moderation-api/PHP %s', VERSION),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.3.0',
                'X-Stainless-Arch' => Util::machtype(),
                'X-Stainless-OS' => Util::ostype(),
                'X-Stainless-Runtime' => php_sapi_name(),
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            baseUrl: $baseUrl,
            options: $options
        );

        $this->authors = new AuthorsService($this);
        $this->queue = new QueueService($this);
        $this->actions = new ActionsService($this);
        $this->content = new ContentService($this);
        $this->account = new AccountService($this);
        $this->auth = new AuthService($this);
        $this->wordlist = new WordlistService($this);
    }

    /** @return array<string,string> */
    protected function authHeaders(): array
    {
        return $this->secretKey ? [
            'Authorization' => "Bearer {$this->secretKey}",
        ] : [];
    }

    /**
     * @internal
     *
     * @param string|list<string> $path
     * @param array<string,mixed> $query
     * @param array<string,string|int|list<string|int>|null> $headers
     * @param RequestOpts|null $opts
     *
     * @return array{NormalizedRequest, RequestOptions}
     */
    protected function buildRequest(
        string $method,
        string|array $path,
        array $query,
        array $headers,
        mixed $body,
        RequestOptions|array|null $opts,
    ): array {
        return parent::buildRequest(
            method: $method,
            path: $path,
            query: $query,
            headers: [...$this->authHeaders(), ...$headers],
            body: $body,
            opts: $opts,
        );
    }
}
