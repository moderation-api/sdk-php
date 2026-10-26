# GetQueueStatsResponseBody

Successful response


## Fields

| Field                                                                   | Type                                                                    | Required                                                                | Description                                                             |
| ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- |
| `reviewStats`                                                           | [Operations\ReviewStats](../../Models/Operations/ReviewStats.md)        | :heavy_check_mark:                                                      | N/A                                                                     |
| `topReviewers`                                                          | array<[Operations\TopReviewer](../../Models/Operations/TopReviewer.md)> | :heavy_check_mark:                                                      | Reviewers with the most resolved items, most first. Up to 10.           |
| `trends`                                                                | [Operations\Trends](../../Models/Operations/Trends.md)                  | :heavy_check_mark:                                                      | N/A                                                                     |