<?php

namespace Tests\Services\Actions;

use ModerationAPI\Actions\Execute\ExecuteExecuteByIDResponse;
use ModerationAPI\Actions\Execute\ExecuteExecuteResponse;
use ModerationAPI\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ExecuteTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(secretKey: 'My Secret Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testExecute(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->actions->execute->execute([
            'actionKey' => 'actionKey',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExecuteExecuteResponse::class, $result);
    }

    #[Test]
    public function testExecuteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->actions->execute->execute([
            'actionKey' => 'actionKey',
            'authorIds' => ['string'],
            'contentIds' => ['string'],
            'duration' => 0,
            'queueId' => 'queueId',
            'value' => 'value',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExecuteExecuteResponse::class, $result);
    }

    #[Test]
    public function testExecuteByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->actions->execute->executeByID('actionId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExecuteExecuteByIDResponse::class, $result);
    }
}
