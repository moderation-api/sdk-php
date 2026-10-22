# GetAccountResponseBody

Account details retrieved successfully


## Fields

| Field                                                                   | Type                                                                    | Required                                                                | Description                                                             |
| ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- | ----------------------------------------------------------------------- |
| `id`                                                                    | *string*                                                                | :heavy_check_mark:                                                      | ID of the account                                                       |
| `paidPlanName`                                                          | *string*                                                                | :heavy_check_mark:                                                      | Name of the paid plan                                                   |
| `textApiQuota`                                                          | *float*                                                                 | :heavy_check_mark:                                                      | Text API quota                                                          |
| `remainingQuota`                                                        | *float*                                                                 | :heavy_check_mark:                                                      | Remaining quota                                                         |
| `currentProject`                                                        | [?Operations\CurrentProject](../../Models/Operations/CurrentProject.md) | :heavy_minus_sign:                                                      | N/A                                                                     |