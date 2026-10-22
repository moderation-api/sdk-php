# ListQueueItemsAction


## Fields

| Field                                       | Type                                        | Required                                    | Description                                 |
| ------------------------------------------- | ------------------------------------------- | ------------------------------------------- | ------------------------------------------- |
| `id`                                        | *string*                                    | :heavy_check_mark:                          | Action ID                                   |
| `name`                                      | *string*                                    | :heavy_check_mark:                          | Action name                                 |
| `comment`                                   | *?string*                                   | :heavy_minus_sign:                          | Action comment                              |
| `timestamp`                                 | *float*                                     | :heavy_check_mark:                          | Unix timestamp of when the action was taken |
| `reviewer`                                  | *?string*                                   | :heavy_minus_sign:                          | Moderator userID                            |