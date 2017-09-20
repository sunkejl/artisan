#####gitbook build /opt/www/erp-doc/markdown/replace_system /opt/www/erp-doc/replace_system/

-----------
#### 接口功能

> 设置结算单已结算

#### URL

> [http://www.baidu.com](http://www.baidu.com)

#### 支持格式

> JSON

#### HTTP请求方式

> POST

#### 请求参数

|参数|必选|类型|说明|
|:----- |:-------|:-----|:-------|
|method |true |string|setSettlementSettled|
|settlementId |true |int|请求的结算单号 |

#### 返回字段

|返回字段|字段类型|说明 |
|:----- |:------|:----------------------------- |
|status | int |返回结果状态。0：正常；1：错误。 |
|msg | string |错误信息 |
|isSuccess | bool|true:成功;false:失败|
