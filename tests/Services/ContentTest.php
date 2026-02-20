<?php

namespace Tests\Services;

use ModerationAPI\Client;
use ModerationAPI\Content\ContentSubmitResponse;
use ModerationAPI\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ContentTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(secretKey: 'My Secret Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testSubmit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->content->submit(
            content: ['text' => 'x', 'type' => 'text']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentSubmitResponse::class, $result);
    }

    #[Test]
    public function testSubmitWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->content->submit(
            content: ['text' => 'x', 'type' => 'text'],
            authorID: 'authorId',
            channel: 'channel',
            contentID: 'contentId',
            conversationID: 'conversationId',
            doNotStore: true,
            metadata: ['foo' => 'bar'],
            metaType: 'profile',
            policies: [['id' => 'toxicity', 'flag' => true, 'threshold' => 0]],
            timestamp: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentSubmitResponse::class, $result);
    }
}
