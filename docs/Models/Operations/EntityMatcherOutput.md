# EntityMatcherOutput

Entity matcher policy.


## Fields

| Field                                                         | Type                                                          | Required                                                      | Description                                                   |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `id`                                                          | *string*                                                      | :heavy_check_mark:                                            | N/A                                                           |
| `type`                                                        | *string*                                                      | :heavy_check_mark:                                            | N/A                                                           |
| `probability`                                                 | *float*                                                       | :heavy_check_mark:                                            | N/A                                                           |
| `flagged`                                                     | *bool*                                                        | :heavy_check_mark:                                            | N/A                                                           |
| `flaggedFields`                                               | array<*string*>                                               | :heavy_minus_sign:                                            | N/A                                                           |
| `matches`                                                     | array<[Operations\MatchT](../../Models/Operations/MatchT.md)> | :heavy_check_mark:                                            | N/A                                                           |