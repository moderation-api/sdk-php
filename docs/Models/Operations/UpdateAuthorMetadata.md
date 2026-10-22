# UpdateAuthorMetadata

Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.


## Fields

| Field                                         | Type                                          | Required                                      | Description                                   |
| --------------------------------------------- | --------------------------------------------- | --------------------------------------------- | --------------------------------------------- |
| `emailVerified`                               | *?bool*                                       | :heavy_minus_sign:                            | Whether the author's email is verified        |
| `phoneVerified`                               | *?bool*                                       | :heavy_minus_sign:                            | Whether the author's phone number is verified |
| `identityVerified`                            | *?bool*                                       | :heavy_minus_sign:                            | Whether the author's identity is verified     |
| `isPayingCustomer`                            | *?bool*                                       | :heavy_minus_sign:                            | Whether the author is a paying customer       |
| `additionalProperties`                        | array<string, *mixed*>                        | :heavy_minus_sign:                            | N/A                                           |