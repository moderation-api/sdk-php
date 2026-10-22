# PermissionDeniedErrorCode

Exactly what went wrong. Stable; safe to branch on. New codes may be added.

- `permission_denied`: The API key cannot perform this request.
- `account_disabled`: The organization account is disabled.
- `quota_exceeded`: The organization has used all API requests on its plan.
- `plan_feature_unavailable`: The current plan does not include this feature.
- `plan_limit_exceeded`: The request goes over a limit of the current plan.
- `organization_key_required`: This endpoint needs an organization API key, but a project key was used.
- `missing_key_permission`: The organization key does not have the permission this endpoint needs.
- `project_not_reachable`: The organization key is limited to other projects.


## Values

| Name                      | Value                     |
| ------------------------- | ------------------------- |
| `PermissionDenied`        | permission_denied         |
| `AccountDisabled`         | account_disabled          |
| `QuotaExceeded`           | quota_exceeded            |
| `PlanFeatureUnavailable`  | plan_feature_unavailable  |
| `PlanLimitExceeded`       | plan_limit_exceeded       |
| `OrganizationKeyRequired` | organization_key_required |
| `MissingKeyPermission`    | missing_key_permission    |
| `ProjectNotReachable`     | project_not_reachable     |