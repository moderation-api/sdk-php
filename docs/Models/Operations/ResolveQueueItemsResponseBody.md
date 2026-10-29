# ResolveQueueItemsResponseBody

Successful response


## Fields

| Field                                                               | Type                                                                | Required                                                            | Description                                                         |
| ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- |
| `resolved`                                                          | *int*                                                               | :heavy_check_mark:                                                  | Number of items resolved.                                           |
| `notFoundIds`                                                       | array<*string*>                                                     | :heavy_check_mark:                                                  | IDs from `itemIds` that match no item or content ID in the project. |