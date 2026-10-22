# GetQueueStatsResponseBody

Successful response


## Fields

| Field                                                                   | Type                                                                    | Required                                                                | Description                                                             |
| ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- |
| `reviewStats`                                                           | [Operations\ReviewStats](../../Models/Operations/ReviewStats.md)        | :heavy_check_mark:                                                      | N/A                                                                     |
| `actionStats`                                                           | array<[Operations\ActionStat](../../Models/Operations/ActionStat.md)>   | :heavy_check_mark:                                                      | N/A                                                                     |
| `topReviewers`                                                          | array<[Operations\TopReviewer](../../Models/Operations/TopReviewer.md)> | :heavy_check_mark:                                                      | List of top reviewers and their statistics                              |
| `trends`                                                                | [Operations\Trends](../../Models/Operations/Trends.md)                  | :heavy_check_mark:                                                      | N/A                                                                     |