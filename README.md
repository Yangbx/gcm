# Simple GCM Server

 `Google Cloud Messaging` 簡稱為` GCM `，是一項Google提供的免費服務，用於推播等功能。

在推播方面分為手機端與Server端   

1. 手機端 : App必須向GCM註冊服務並且收到GCM給予的` REG_ID `   
2. Server端 : Server端必須取得` Google API KEY `、` APP_REG_ID `

詳細資訊：<https://developers.google.com/cloud-messaging/>


----------

##How to use
You can use it test your GCM App.

![enter image description here](http://i.imgur.com/1bvbWPv.png)

 1. `config.php` 內`YOUR Google API KEY`處填入你的`API KEY`
    
    ```
	   define("GOOGLE_API_KEY", "YOUR Google API KEY");
   ```
   
 2. 於WebSite中填入`regID`與`Message`後按下送出

      ***× 可以利用`,`隔開多個`regID`一次發送多筆資料。***

![enter image description here](http://i.imgur.com/mDjonX4.png)
![enter image description here](http://i.imgur.com/dU1iy5E.png)

##參考資訊
<https://developers.google.com/cloud-messaging/http>