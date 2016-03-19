## 目的

單元測試 從手機端 往上送 的 參數是否正確

## readme

- config.php : 設定 key name
- post_receive.php : 用 post 去接收參數
- get_receive.php : 用 get 去接收參數

- receive 的 php 會取得以下資料，並存成 [Temp-日期]/[時間].txt 於資料夾中 
	- 使用方法
	- unix time
	- 日期 / 時間
	- 參數
	- ip位置

## 測試方法

- 透過 postMan 進行參數傳遞
- 在 app 中，放入此 api，可測試上傳參數的單元測試 

## gitignore

```
Temp-*
Temp-*/*
```