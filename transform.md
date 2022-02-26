
# 匯率轉換接口說明

匯率範例:

```json
{
    "currencies": {
        "TWD": {
            "TWD": 1,
            "JPY": 3.669,
            "USD": 0.03281
        },
        "JPY": {
            "TWD": 0.26956,
            "JPY": 1,
            "USD": 0.00885
        },
        "USD": {
            "TWD": 30.444,
            "JPY": 111.801,
            "USD": 1
        }
    }
}
```
## 邏輯處理:
- 1:from，to，amount 透過表單驗證確定有傳入 來源幣別，目標幣別，金額數字
- 2:較驗from與to 是否存在於匯率內，如不存在則返回錯誤
- 3:拿出歸屬幣種 用金額*兌換目標幣種，採取四捨五入後在加入逗點分隔千分位
- 

## 參數說明


欄位        | 說明        | 備註
------------|------------|------------|
from       | 來源幣別     | 來源的幣種 
to         | 目標幣別     | 要轉換的幣種
amount     | 金額數字     | 金額

## /api/exchangeRate/transform

### input 入參
```json
from: "USD"
to: "TWD"
amount: "0.35"
```
### output 200
```json
{
    "code": 200,
    "msg": "请求成功！",
    "data": {
        "from_currencies": {
            "TWD": 30.444,
            "JPY": 111.801,
            "USD": 1
        },
        "camount": "10.66"
    }
}
```
### output request 限制

```json
{
    "code": 422,
    "msg": "The 金額數字 field is required."
}
```