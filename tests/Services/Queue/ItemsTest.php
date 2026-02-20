<?php

namespace Tests\Services\Queue;

use ModerationAPI\Client;
use ModerationAPI\Core\Util;
use ModerationAPI\Queue\Items\ItemListResponse;
use ModerationAPI\Queue\Items\ItemResolveResponse;
use ModerationAPI\Queue\Items\ItemUnresolveResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ItemsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->items->list('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ItemListResponse::class, $result);
    }

    #[Test]
    public function testResolve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->items->resolve('itemId', id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ItemResolveResponse::class, $result);
    }

    #[Test]
    public function testResolveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->items->resolve(
            'itemId',
            id: 'id',
            comment: 'comment'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ItemResolveResponse::class, $result);
    }

    #[Test]
    public function testUnresolve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->items->unresolve('itemId', id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ItemUnresolveResponse::class, $result);
    }

    #[Test]
    public function testUnresolveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->queue->items->unresolve(
            'itemId',
            id: 'id',
            comment: 'comment'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ItemUnresolveResponse::class, $result);
    }
}
