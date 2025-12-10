<?php

declare(strict_types=1);

namespace ModerationAPI;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use ModerationAPI\Core\BaseClient;
use ModerationAPI\Services\AccountService;
use ModerationAPI\Services\ActionsService;
use ModerationAPI\Services\AuthorsService;
use ModerationAPI\Services\AuthService;
use ModerationAPI\Services\ContentService;
use ModerationAPI\Services\QueueService;
use ModerationAPI\Services\WordlistService;

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

    public function __construct(?string $secretKey = null, ?string $baseUrl = null)
    {
        $this->secretKey = (string) ($secretKey ?? getenv('MODAPI_SECRET_KEY'));

        $baseUrl ??= getenv(
            'MODERATION_API_BASE_URL'
        ) ?: 'https://api.moderationapi.com/v1';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            // x-release-please-start-version
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('moderation-api/PHP %s', '0.3.0'),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.3.0',
                'X-Stainless-OS' => $this->getNormalizedOS(),
                'X-Stainless-Arch' => $this->getNormalizedArchitecture(),
                'X-Stainless-Runtime' => 'php',
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            // x-release-please-end
            baseUrl: $baseUrl,
            options: $options,
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
}
