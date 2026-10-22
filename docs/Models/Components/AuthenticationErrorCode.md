# AuthenticationErrorCode

Exactly what went wrong. Stable; safe to branch on. New codes may be added.

- `unauthorized`: Authentication failed.
- `missing_api_key`: No API key in the `Authorization` header.
- `malformed_api_key`: The `Authorization` header does not contain a valid key format.
- `invalid_api_key`: The API key does not exist or was revoked.


## Values

| Name              | Value             |
| ----------------- | ----------------- |
| `Unauthorized`    | unauthorized      |
| `MissingApiKey`   | missing_api_key   |
| `MalformedApiKey` | malformed_api_key |
| `InvalidApiKey`   | invalid_api_key   |