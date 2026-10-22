<?php

/**
 * Verify webhook deliveries from Moderation API.
 *
 * Every delivery is signed with HMAC-SHA256 over the raw request body, using
 * your project's webhook signing secret. The hex-encoded signature is in the
 * `modapi-signature` header.
 *
 * Maintained by hand in moderation-api/sdk-generator (custom/php), not generated.
 */

declare(strict_types=1);

namespace ModerationApi;

final class WebhookSignature
{
    public const HEADER = 'modapi-signature';

    public const SECRET_ENV_VAR = 'MODAPI_WEBHOOK_SECRET';

    private static function secret(?string $secret): string
    {
        if ($secret !== null && $secret !== '') {
            return $secret;
        }
        $fromEnv = getenv(self::SECRET_ENV_VAR);

        return $fromEnv === false ? '' : $fromEnv;
    }

    /** Return the hex HMAC-SHA256 signature for a raw payload. */
    public static function computeSignature(string $payload, string $secret): string
    {
        return hash_hmac('sha256', $payload, $secret);
    }

    /** Return true if $signature matches the raw $payload. $secret defaults to MODAPI_WEBHOOK_SECRET. */
    public static function verify(string $payload, ?string $signature, ?string $secret = null): bool
    {
        $secret = self::secret($secret);
        if ($signature === null || $signature === '' || $secret === '') {
            return false;
        }

        return hash_equals(self::computeSignature($payload, $secret), strtolower(trim($signature)));
    }

    /**
     * Verify a delivery and return the decoded event.
     *
     * Pass the raw request body exactly as received and the value of the
     * `modapi-signature` header. $secret defaults to the MODAPI_WEBHOOK_SECRET
     * environment variable.
     *
     * @return array<string, mixed>
     * @throws WebhookSignatureException when the signature does not match.
     */
    public static function constructEvent(string $payload, ?string $signature, ?string $secret = null): array
    {
        if (!self::verify($payload, $signature, $secret)) {
            throw new WebhookSignatureException('Webhook signature does not match the payload');
        }

        return json_decode($payload, true, 512, JSON_THROW_ON_ERROR);
    }
}
