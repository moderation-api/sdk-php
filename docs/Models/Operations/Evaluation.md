# Evaluation

The evaluation of the content after running the channel policies.


## Fields

| Field                                                                               | Type                                                                                | Required                                                                            | Description                                                                         |
| ----------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------- | ----------------------------------------------------------------------------------- |
| `flagged`                                                                           | *bool*                                                                              | :heavy_check_mark:                                                                  | Whether the content was flagged by any policy.                                      |
| `flagProbability`                                                                   | *float*                                                                             | :heavy_check_mark:                                                                  | The probability that the content should be flagged.                                 |
| `severityScore`                                                                     | *float*                                                                             | :heavy_check_mark:                                                                  | The severity score of the content. A higher score indicates more severe content.    |
| `unicodeSpoofed`                                                                    | *?bool*                                                                             | :heavy_minus_sign:                                                                  | Whether the content was flagged for Unicode spoofing.                               |
| `shadowFlagged`                                                                     | *?bool*                                                                             | :heavy_minus_sign:                                                                  | Whether the content would have been flagged by analyze-only policies (flag: false). |