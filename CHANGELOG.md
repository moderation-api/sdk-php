# Changelog

## 0.7.1 (2026-02-20)

Full Changelog: [v0.7.0...v0.7.1](https://github.com/moderation-api/sdk-php/compare/v0.7.0...v0.7.1)

### Chores

* update mock server docs ([497f083](https://github.com/moderation-api/sdk-php/commit/497f0832fa69f666332f9e533304ecef044de57b))

## 0.7.0 (2026-02-20)

Full Changelog: [v0.6.0...v0.7.0](https://github.com/moderation-api/sdk-php/compare/v0.6.0...v0.7.0)

### Features

* **api:** api update ([c14acbd](https://github.com/moderation-api/sdk-php/commit/c14acbdd4629949741d09844179ad7340ef031e8))


### Chores

* **internal:** remove mock server code ([e31efc6](https://github.com/moderation-api/sdk-php/commit/e31efc645e253b254f8fe91c76a105e9e72c2ff5))
* **release:** add packagist trigger on published release ([7f1cbff](https://github.com/moderation-api/sdk-php/commit/7f1cbffe57af54ddf5f22a108843f293664171ba))

## 0.6.0 (2026-02-06)

Full Changelog: [v0.5.0...v0.6.0](https://github.com/moderation-api/sdk-php/compare/v0.5.0...v0.6.0)

### Features

* **api:** api update ([9bac1c1](https://github.com/moderation-api/sdk-php/commit/9bac1c10cfd4531d2ba6c7b8c2e03e7285cf48fb))

## 0.5.0 (2026-02-03)

Full Changelog: [v0.4.0...v0.5.0](https://github.com/moderation-api/sdk-php/compare/v0.4.0...v0.5.0)

### Features

* use `$_ENV` aware getenv helper ([74f3ced](https://github.com/moderation-api/sdk-php/commit/74f3ced21bafe42f2be6ced3dcaedb5768eddf9f))


### Chores

* **internal:** php cs fixer should not be memory limited ([d6b7284](https://github.com/moderation-api/sdk-php/commit/d6b7284ff014ceac8dbac28c8a46aad5da2a3ffe))

## 0.4.0 (2026-01-31)

Full Changelog: [v0.3.0...v0.4.0](https://github.com/moderation-api/sdk-php/compare/v0.3.0...v0.4.0)

### ⚠ BREAKING CHANGES

* replace special flag type `omittable` with just `null`
* use aliases for phpstan types
* improve identifier renaming for names that clash with builtins

### Features

* add idempotency header support ([4b941bd](https://github.com/moderation-api/sdk-php/commit/4b941bd0c16b8fe812da9ad660d49a4cb24e936d))
* **api:** api update ([4e4f842](https://github.com/moderation-api/sdk-php/commit/4e4f8424fce03d262c50b50b060b8103c41f4d0e))
* **api:** api update ([859828f](https://github.com/moderation-api/sdk-php/commit/859828f8d807016ae945da409a699e399236640c))
* **api:** api update ([c7142a7](https://github.com/moderation-api/sdk-php/commit/c7142a7b0a048a20c420d935420f9108b7546088))
* improve identifier renaming for names that clash with builtins ([8028859](https://github.com/moderation-api/sdk-php/commit/8028859af7460243fc4c23f2e2541ff65ba542d6))
* improved phpstan type annotations ([1e1c3c6](https://github.com/moderation-api/sdk-php/commit/1e1c3c6816b004ce6126a7d757a2c8c4cbf4c40f))
* replace special flag type `omittable` with just `null` ([5294f9f](https://github.com/moderation-api/sdk-php/commit/5294f9fe1ceeb4443c20c709a6a6e1e7e269d53b))
* simplify and make the phpstan types more consistent ([0735967](https://github.com/moderation-api/sdk-php/commit/07359676f9a4e714a1ea6e06cbd39a03563f7980))
* support unwrapping envelopes ([50fbe5d](https://github.com/moderation-api/sdk-php/commit/50fbe5dfebbe02573f73df5c190512a0e566784d))
* use aliases for phpstan types ([e17e879](https://github.com/moderation-api/sdk-php/commit/e17e879f4fd01c07356de5ed18f2021ad9e5e426))


### Bug Fixes

* a number of serialization errors ([4a43323](https://github.com/moderation-api/sdk-php/commit/4a4332385de4fd74a5b6d6499fc915d6ad3b5ade))
* correctly serialize dates ([8b350ba](https://github.com/moderation-api/sdk-php/commit/8b350ba2b06ecf19174392a8b9b8bcc0b1a500c0))
* support arrays in query param construction ([032b424](https://github.com/moderation-api/sdk-php/commit/032b424bd40e42f0ec67191d1c5a067d1dd84e2b))
* typos in README.md ([edeefaf](https://github.com/moderation-api/sdk-php/commit/edeefaf7b79b4104fd9e8eacf93095720b840533))


### Chores

* add git attributes and composer lock file ([0ec3ea1](https://github.com/moderation-api/sdk-php/commit/0ec3ea12cfcb0f72172bb144d3adae63a6dd2082))
* **internal:** add a basic client test ([36b8433](https://github.com/moderation-api/sdk-php/commit/36b8433b78f6f885049c83049a60add2368bb04d))
* **internal:** codegen related update ([d600edc](https://github.com/moderation-api/sdk-php/commit/d600edc6cb485d3eb97c56682e75a5c800a0c717))
* **internal:** codegen related update ([597bdf7](https://github.com/moderation-api/sdk-php/commit/597bdf718c72f298fd94157b21e9f64c17a2449d))
* **internal:** codegen related update ([c26566d](https://github.com/moderation-api/sdk-php/commit/c26566d911dda034a275bef8a4ef280ee6a49255))
* **internal:** codegen related update ([b2aba3e](https://github.com/moderation-api/sdk-php/commit/b2aba3e999c1375da44e8a8b9a6f0fdb7a649950))
* **internal:** codegen related update ([5e43726](https://github.com/moderation-api/sdk-php/commit/5e4372642129cea14086a71f584d75ee3b52b5f8))
* **internal:** codegen related update ([9b7c72f](https://github.com/moderation-api/sdk-php/commit/9b7c72f4df8838a5c2e5a597e95fccc625e828f5))
* **internal:** codegen related update ([7cbad4c](https://github.com/moderation-api/sdk-php/commit/7cbad4c86abc4a9ac9dde0f97d4e9adc9f127c5e))
* **internal:** codegen related update ([e6f45f4](https://github.com/moderation-api/sdk-php/commit/e6f45f4733e0da4e79072d7d76644e2bb8fc1f78))
* **internal:** codegen related update ([b7631a0](https://github.com/moderation-api/sdk-php/commit/b7631a0f4a9fa10af3f6eda50be50fb78e66e222))
* **internal:** codegen related update ([6171347](https://github.com/moderation-api/sdk-php/commit/6171347fc5833d947bf081bcac878e965555bf91))
* **internal:** minor test script reformatting ([50ba7b7](https://github.com/moderation-api/sdk-php/commit/50ba7b776f4ef78948611ea7ecefcde18195dd73))
* **internal:** refactor auth by moving concern from base client into client ([37eeb69](https://github.com/moderation-api/sdk-php/commit/37eeb691d9f06d91fa71e39e70ef335472621ee0))
* **internal:** update `actions/checkout` version ([f3c6d09](https://github.com/moderation-api/sdk-php/commit/f3c6d09511b60b4d3b9fc5a01399a2eaaad3d76e))
* **readme:** remove beta warning now that we're in ga ([dd62d54](https://github.com/moderation-api/sdk-php/commit/dd62d5463f2ff7c50e593a063f7db60fcaa6bcde))

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
