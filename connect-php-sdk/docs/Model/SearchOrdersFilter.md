# SearchOrdersFilter

### Description

Filter options to use for a query. Multiple filters will be ANDed together.

## Properties
Name | Getter | Setter | Type | Description | Notes
------------ | ------------- | ------------- | ------------- | ------------- | -------------
**state_filter** | getStateFilter() | setStateFilter($value) | [**\SquareConnect\Model\SearchOrdersStateFilter**](SearchOrdersStateFilter.md) | Filter by [&#x60;OrderState&#x60;](#type-orderstate). | [optional] 
**date_time_filter** | getDateTimeFilter() | setDateTimeFilter($value) | [**\SquareConnect\Model\SearchOrdersDateTimeFilter**](SearchOrdersDateTimeFilter.md) | Filter for results within a time range. | [optional] 
**fulfillment_filter** | getFulfillmentFilter() | setFulfillmentFilter($value) | [**\SquareConnect\Model\SearchOrdersFulfillmentFilter**](SearchOrdersFulfillmentFilter.md) | Filter by fulfillment type or state. | [optional] 
**source_filter** | getSourceFilter() | setSourceFilter($value) | [**\SquareConnect\Model\SearchOrdersSourceFilter**](SearchOrdersSourceFilter.md) | Filter by source of order. | [optional] 
**customer_filter** | getCustomerFilter() | setCustomerFilter($value) | [**\SquareConnect\Model\SearchOrdersCustomerFilter**](SearchOrdersCustomerFilter.md) | Filter by customers associated with the order. | [optional] 

Note: All properties are protected and only accessed via getters and setters.

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

