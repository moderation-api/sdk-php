# GetAnalyticsChannelsResponseBody

Successful response


## Fields

| Field                                                                                                        | Type                                                                                                         | Required                                                                                                     | Description                                                                                                  |
| ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------ |
| `range`                                                                                                      | [Operations\GetAnalyticsChannelsRangeResponse](../../Models/Operations/GetAnalyticsChannelsRangeResponse.md) | :heavy_check_mark:                                                                                           | The time window of the numbers.                                                                              |
| `channels`                                                                                                   | array<[Operations\Channel](../../Models/Operations/Channel.md)>                                              | :heavy_check_mark:                                                                                           | Requests and flags per channel. Channels with no requests in the window are not included.                    |