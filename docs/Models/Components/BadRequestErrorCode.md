# BadRequestErrorCode

Exactly what went wrong. Stable; safe to branch on. New codes may be added.

- `invalid_request`: A parameter is invalid. `message` says which one.
- `validation_failed`: The request body does not match the schema. `issues` lists each problem with its `path`.


## Values

| Name               | Value              |
| ------------------ | ------------------ |
| `InvalidRequest`   | invalid_request    |
| `ValidationFailed` | validation_failed  |