# UnresolveQueueItemResponseBody

Successful response


## Fields

| Field                                                                                      | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `success`                                                                                  | *bool*                                                                                     | :heavy_check_mark:                                                                         | N/A                                                                                        |
| `status`                                                                                   | [Operations\UnresolveQueueItemStatus](../../Models/Operations/UnresolveQueueItemStatus.md) | :heavy_check_mark:                                                                         | `pending` waits for review. `resolved` is reviewed.                                        |
| `unresolvedAt`                                                                             | *string*                                                                                   | :heavy_check_mark:                                                                         | When the item was unresolved (ISO 8601).                                                   |