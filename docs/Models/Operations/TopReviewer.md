# TopReviewer


## Fields

| Field                                                               | Type                                                                | Required                                                            | Description                                                         |
| ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- | ------------------------------------------------------------------- |
| `userId`                                                            | *string*                                                            | :heavy_check_mark:                                                  | ID of the reviewer                                                  |
| `name`                                                              | *string*                                                            | :heavy_check_mark:                                                  | Name of the reviewer                                                |
| `reviewCount`                                                       | *float*                                                             | :heavy_check_mark:                                                  | Number of items reviewed                                            |
| `averageTimePerReview`                                              | *float*                                                             | :heavy_check_mark:                                                  | Average review time in milliseconds                                 |
| `accuracyScore`                                                     | *?float*                                                            | :heavy_minus_sign:                                                  | Optional accuracy score based on review quality metrics             |
| `topActions`                                                        | array<[Operations\TopAction](../../Models/Operations/TopAction.md)> | :heavy_check_mark:                                                  | Most common actions taken by this reviewer                          |