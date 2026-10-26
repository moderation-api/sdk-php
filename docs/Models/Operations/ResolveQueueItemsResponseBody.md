# ResolveQueueItemsResponseBody

Successful response


## Fields

| Field                                      | Type                                       | Required                                   | Description                                |
| ------------------------------------------ | ------------------------------------------ | ------------------------------------------ | ------------------------------------------ |
| `resolved`                                 | *int*                                      | :heavy_check_mark:                         | Number of items resolved.                  |
| `notFoundIds`                              | array<*string*>                            | :heavy_check_mark:                         | Item IDs that do not exist in the project. |