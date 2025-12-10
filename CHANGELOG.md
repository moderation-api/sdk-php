# Changelog

## 0.3.0 (2025-12-10)

Full Changelog: [v0.2.0...v0.3.0](https://github.com/moderation-api/sdk-php/compare/v0.2.0...v0.3.0)

### ⚠ BREAKING CHANGES

* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([b70b4c9](https://github.com/moderation-api/sdk-php/commit/b70b4c941e71381dffd8332bbf3331e6e4482ee1))
* split out services into normal & raw types ([a7e26e6](https://github.com/moderation-api/sdk-php/commit/a7e26e6953f26a9b72075bee096f32fc8ddc1ba5))
* use camel casing for all class properties ([fc81f4b](https://github.com/moderation-api/sdk-php/commit/fc81f4b7f1afde496947d52394e3c2b50be9478f))


### Chores

* ensure constant values are marked as optional in array types ([50679be](https://github.com/moderation-api/sdk-php/commit/50679be728b3629ebc80582aa18deb111280927a))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([0b40eda](https://github.com/moderation-api/sdk-php/commit/0b40edaeadad1f12f6066b520829c057a05927f3))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([a8db5b6](https://github.com/moderation-api/sdk-php/commit/a8db5b63c804ddb837662907da5ed6efa0f921fd))

## 0.2.0 (2025-12-06)

Full Changelog: [v0.1.1...v0.2.0](https://github.com/moderation-api/sdk-php/compare/v0.1.1...v0.2.0)

### Features

* allow both model class instances and arrays in setters ([1274a2b](https://github.com/moderation-api/sdk-php/commit/1274a2bd53a9f15182101eec6c3859936d03c36d))
* **api:** api update ([8d25646](https://github.com/moderation-api/sdk-php/commit/8d25646629a65b87ea31fccc053f2b4f45d13a2c))

## 0.1.1 (2025-12-05)

Full Changelog: [v0.1.0...v0.1.1](https://github.com/moderation-api/sdk-php/compare/v0.1.0...v0.1.1)

### Chores

* readme ([65df962](https://github.com/moderation-api/sdk-php/commit/65df96240020a24218c8651e75bdddcacc99c9fb))

## 0.1.0 (2025-12-05)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/moderation-api/sdk-php/compare/v0.0.1...v0.1.0)

### Features

* **api:** api update ([6c8bb2b](https://github.com/moderation-api/sdk-php/commit/6c8bb2b7f96b2738e0372bde5ba2145fd9988f02))
* **api:** manual updates ([ef82adb](https://github.com/moderation-api/sdk-php/commit/ef82adb1051c8dcce23403c347e28b60c94a5fdd))


### Chores

* configure new SDK language ([776a68a](https://github.com/moderation-api/sdk-php/commit/776a68a875b20952a9854f5f87930a197edc07b1))
* update SDK settings ([f4928d8](https://github.com/moderation-api/sdk-php/commit/f4928d8e51c5a9a0b903fb8e443c2a630c608473))
