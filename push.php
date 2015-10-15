<?php
/*
    * 向Google Cloud Messaging推送訊息。
    *
    * 必須傳送GCM的Registration ID(regID, 如果有多個，用','隔開)，和要傳送的訊息(msg)。
    * 部份或是全部傳送成功傳回「成功數量/總共數量」(不是除法)、全部傳送失敗傳回error。
    *
    * 若傳送成功，
    * Android端接收時用getExtra().getString("message")來取得訊息。
    *
    * 補充：
    * Registration ID是由Android客戶端向GCM註冊，GCM回傳給客戶端的獨有ID。
    *
    * Powered by magiclen.org
*/

    $json = array();

    $regId = $_POST["regID"];
    $msg = $_POST["msg"];
    if (isset($regId) && isset($msg)) {
        require_once("GCM.php");
        $message = array("message" => $msg);
        $regId = explode(",", $regId);
        $result = gcm_push_notification($regId, $message);
        $success_code = json_decode($result,true)["success"];
        echo json_encode(['Message'=>'Success','msg_content'=>'Success：'.$success_code.'  ／  '.'Total：'.count($regId)]);
    } else {
        echo json_encode(['Message'=>'Error','msg_content'=>'Params Not Enought']);
    }
?>
