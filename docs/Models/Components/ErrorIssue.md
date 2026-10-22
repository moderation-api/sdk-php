# ErrorIssue


## Fields

| Field                                                  | Type                                                   | Required                                               | Description                                            |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| `message`                                              | *string*                                               | :heavy_check_mark:                                     | What is wrong.                                         |
| `path`                                                 | array<[string\|float](../../Models/Components/Path.md)> | :heavy_minus_sign:                                     | Location of the invalid field in the request body.     |
| `code`                                                 | *?string*                                              | :heavy_minus_sign:                                     | Validation rule that failed.                           |