<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clova extends CI_Model {

    public function voice(){
        $hostNameUrl = "https://kr.object.ncloudstorage.com";
//        $serviceId = "ncp:sms:kr:260014397609:jdc";
        $accessKey = "92AB9FB4CB6E3F67F970";
        $secretKey = "A0B33F0E2004F58590A9324B38B65216AB82C73D";

//        $apiUrl = "https://naveropenapi.apigw.ntruss.com/tts-premium/v1/tts";
//        $applicationName = "ub-clova-voice";
//        $clientId = "e0eyzarzci";
//        $clientSecret = "vTik6pRBKLI2yTPV7weYP0dUM893c7x8O7TtMHpq";

        try {
            $timestamp = round(microtime(true) * 1000);

//            $baseString = $requestUrl;

            // make signature
            $space = " ";
            $newLine = "\n";
            $method = "POST";
            $hmac = $method.$space.$newLine.$timestamp.$newLine.$accessKey;
            $signautue = base64_encode(hash_hmac('sha256', $hmac, $secretKey,true));

//            $url = $hostNameUrl.$baseString;

            $data = array(
                'speaker' => 'mijin',
                'text' => '낑지누나 블서하는거 보고 배워야지! 블서 잘 하는 낑지누나 보고 배워야지! 섹시여캠김낑지! 섹시여캠김낑지!'
//                'text' => 'hello'
            );
//            echo http_build_query($data);
            $is_post = true;
            $ch = curl_init();
            $encText = urlencode($data['text']);
//            $postvars = "speaker=nara&volume=0&speed=0&pitch=0&format=mp3&text=".$encText;
//            echo $url;
            curl_setopt($ch, CURLOPT_URL, $hostNameUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//            curl_setopt($ch,CURLOPT_POSTFIELDS, $postvars);
            $headers = array();
            $headers[] = "Content-Type: application/x-www-form-urlencoded; charset=utf-8";
            $headers[] = "X-NCP-APIGW-TIMESTAMP: " .$timestamp;
//            $headers[] = "X-NCP-APIGW-API-KEY-ID: " .$clientId;
            $headers[] = "X-NCP-IAM-ACCESS-KEY: " .$accessKey;
            $headers[] = "X-NCP-APIGW-SIGNATURE-V2: " .$signautue;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//            curl_setopt($ch, CURLOPT_POST, true);

            $response = curl_exec ($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//            echo "status_code:".$status_code."<br />";
            curl_close ($ch);
            if($status_code == 200) {
                //echo $response;
                $rand_num = mt_rand(0,99);
                $fn = "tts' . $rand_num . '.mp3";
                $fp = fopen($fn, "w+");
                fwrite($fp, $response);
                fclose($fp);
                echo "<a href='$fn'>TTS재생</a>";
            } else {
                echo "Error 내용:".$response;
            }
            return $response;
        } catch(Exception $E) {
    //        $geoloc_res = "Response: ". $E->lastResponse . "\n";
            echo "error";
        }

    }
}

/* End of file Clova.php */
