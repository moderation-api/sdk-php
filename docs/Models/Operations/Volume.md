# Volume


## Fields

| Field                                                    | Type                                                     | Required                                                 | Description                                              |
| -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- |
| `start`                                                  | *string*                                                 | :heavy_check_mark:                                       | Start of the bucket, as an ISO 8601 timestamp in UTC.    |
| `requests`                                               | *int*                                                    | :heavy_check_mark:                                       | Requests received in the bucket.                         |
| `flagged`                                                | *int*                                                    | :heavy_check_mark:                                       | Requests flagged in the bucket.                          |
| `rejected`                                               | *int*                                                    | :heavy_check_mark:                                       | Requests with the recommendation "reject" in the bucket. |
| `sentToReview`                                           | *int*                                                    | :heavy_check_mark:                                       | Requests with the recommendation "review" in the bucket. |