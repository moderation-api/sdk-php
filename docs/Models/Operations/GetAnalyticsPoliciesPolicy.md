# GetAnalyticsPoliciesPolicy


## Fields

| Field                                                                    | Type                                                                     | Required                                                                 | Description                                                              |
| ------------------------------------------------------------------------ | ------------------------------------------------------------------------ | ------------------------------------------------------------------------ | ------------------------------------------------------------------------ |
| `label`                                                                  | *string*                                                                 | :heavy_check_mark:                                                       | The policy label, for example `toxicity`.                                |
| `flagged`                                                                | *int*                                                                    | :heavy_check_mark:                                                       | Flagged requests with this label in the window. Repeats count each time. |
| `previousFlagged`                                                        | *int*                                                                    | :heavy_check_mark:                                                       | Flagged requests with this label in the window of equal length before.   |