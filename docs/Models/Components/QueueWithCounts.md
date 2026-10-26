# QueueWithCounts


## Fields

| Field                                                  | Type                                                   | Required                                               | Description                                            |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| `id`                                                   | *string*                                               | :heavy_check_mark:                                     | The queue ID.                                          |
| `name`                                                 | *string*                                               | :heavy_check_mark:                                     | The queue name.                                        |
| `description`                                          | *string*                                               | :heavy_check_mark:                                     | The queue description.                                 |
| `isDefault`                                            | *bool*                                                 | :heavy_check_mark:                                     | Whether this is the default queue of the project.      |
| `unresolvedItemsCount`                                 | *int*                                                  | :heavy_check_mark:                                     | Number of items that wait for review.                  |
| `resolvedItemsCount`                                   | *int*                                                  | :heavy_check_mark:                                     | Number of items that are resolved.                     |
| `totalItemsCount`                                      | *int*                                                  | :heavy_check_mark:                                     | Number of items in the queue, resolved and unresolved. |