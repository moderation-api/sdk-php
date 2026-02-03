<?php

namespace Tests\Services\Wordlist;

use ModerationAPI\Client;
use ModerationAPI\Core\Util;
use ModerationAPI\Wordlist\Words\WordAddResponse;
use ModerationAPI\Wordlist\Words\WordRemoveResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class WordsTest extends TestCase
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
    public function testAdd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->wordlist->words->add('id', words: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WordAddResponse::class, $result);
    }

    #[Test]
    public function testAddWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->wordlist->words->add('id', words: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WordAddResponse::class, $result);
    }

    #[Test]
    public function testRemove(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->wordlist->words->remove('id', words: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WordRemoveResponse::class, $result);
    }

    #[Test]
    public function testRemoveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->wordlist->words->remove('id', words: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WordRemoveResponse::class, $result);
    }
}
