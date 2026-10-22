# GetWordlistEmbeddingStatusResponseBody

Embedding status details


## Fields

| Field                                               | Type                                                | Required                                            | Description                                         |
| --------------------------------------------------- | --------------------------------------------------- | --------------------------------------------------- | --------------------------------------------------- |
| `progress`                                          | *float*                                             | :heavy_check_mark:                                  | Percentage of words that have been embedded (0-100) |
| `totalWords`                                        | *float*                                             | :heavy_check_mark:                                  | Total number of words in the wordlist               |
| `remainingWords`                                    | *float*                                             | :heavy_check_mark:                                  | Number of words still waiting to be embedded        |