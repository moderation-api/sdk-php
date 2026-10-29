# DeleteWordlistResponseBody

Wordlist deleted successfully


## Fields

| Field                                                                 | Type                                                                  | Required                                                              | Description                                                           |
| --------------------------------------------------------------------- | --------------------------------------------------------------------- | --------------------------------------------------------------------- | --------------------------------------------------------------------- |
| `id`                                                                  | *string*                                                              | :heavy_check_mark:                                                    | ID of the deleted wordlist                                            |
| `deleted`                                                             | *bool*                                                                | :heavy_check_mark:                                                    | Whether the wordlist was deleted                                      |
| `detachedChannelIds`                                                  | array<*string*>                                                       | :heavy_check_mark:                                                    | IDs of the channels that used the wordlist. It was removed from them. |