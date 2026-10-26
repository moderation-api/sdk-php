# TopReviewer


## Fields

| Field                                                                   | Type                                                                    | Required                                                                | Description                                                             |
| ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- |
| `userId`                                                                | *string*                                                                | :heavy_check_mark:                                                      | The user ID of the reviewer. `null` for items resolved with an API key. |
| `name`                                                                  | *string*                                                                | :heavy_check_mark:                                                      | The name of the reviewer.                                               |
| `reviewCount`                                                           | *int*                                                                   | :heavy_check_mark:                                                      | Number of items the reviewer resolved in the period.                    |