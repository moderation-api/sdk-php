# ExecuteActionRequest

Input parameters


## Fields

| Field                                                                       | Type                                                                        | Required                                                                    | Description                                                                 |
| --------------------------------------------------------------------------- | --------------------------------------------------------------------------- | --------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| `actionKey`                                                                 | *string*                                                                    | :heavy_check_mark:                                                          | ID or key of the action to execute                                          |
| `contentIds`                                                                | array<*string*>                                                             | :heavy_minus_sign:                                                          | IDs of the content items to apply the action to. Provide this or authorIds. |
| `authorIds`                                                                 | array<*string*>                                                             | :heavy_minus_sign:                                                          | IDs of the authors to apply the action to. Provide this or contentIds.      |
| `value`                                                                     | *?string*                                                                   | :heavy_minus_sign:                                                          | Optional value to provide with the action                                   |
| `queueId`                                                                   | *?string*                                                                   | :heavy_minus_sign:                                                          | Optional queue ID if the action is queue-specific                           |
| `duration`                                                                  | *?float*                                                                    | :heavy_minus_sign:                                                          | Optional duration in milliseconds for actions with timeouts                 |