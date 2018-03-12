<?php

/**
 * Class CustomHangzhou
 */
class CustomZheJiang
{
    /**
     */
    const COMPANY_CODE = "";

    /**
     */
    const COMPANY_NAME = "";

    /**
     */
    const BUSINESS_TYPE = "IMPORTORDER";

    /**
     */
    const A_LI_PAY_TYPE = 1;

    /**
     */
    const ALL_IN_PAY_TYPE = 2;

    /**
     * @var
     */
    private $url = "";


    /**
     * @var
     */
    private $aesHangzhouKey;

    /**
     * @var
     */
    private $aesLocalKey;

    /**
     * @var
     */
    private $rsaHangzhouPublicKey;

    /**
     * 本地RSA私钥
     * @var
     */
    private $rsaLocalPrivateKey;

    /**
     * @var
     */
    private $rsaLocalPublicKey;

    /**
     * @var array
     */
    private $nations = array(
        "AU" => "601",
        "NL" => "309",
        "CA" => "501",
        "US" => "502",
        "NZ" => "609",
        "NO" => "326",
        "JP" => "116",
        "ES" => "312",
        "SG" => "132",
        "FR" => "305",
        "GB" => "303",
        "DE" => "304",
        "KR" => "133",
        "IT" => "307",
        "HK" => "110",
        "IL" => "115",
    );

    /**
     */
    private $clsGlobalOrder;

    /**
     */
    private $db;

    /**
     * @var
     */
    private $postCast;

    /**
     * @var
     */
    private $requestStr = "";


    /**
     * @var
     */
    private $responseStr = "";


    /**
     */
    public function __construct($configArray, GLOBAL_ORDER $clsGlobalOrder, $db)
    {
        extract($configArray);
        if (!isset($aesLocalKey, $aesHangzhouKey, $rsaHangzhouPublicKey, $rsaLocalPublicKey, $rsaLocalPrivateKey) || empty($aesHangzhouKey) || empty($aesLocalKey) || empty($rsaHangzhouPublicKey) || empty($rsaLocalPublicKey) || empty($rsaLocalPrivateKey) || !is_object($clsGlobalOrder)) {
            throw new Exception("公钥或者私钥未设置");
        }
        if (!is_object($clsGlobalOrder) || get_class($clsGlobalOrder) != "GLOBAL_ORDER") {
            throw new Exception("缺少全球购类");
        }
        if (empty($url)) {
            throw new Exception("缺少url");
        }
        $this->setAesLocalKey($aesLocalKey);
        $this->setAesHangzhouKey($aesHangzhouKey);
        $this->setRsaHangzhouPublicKey($rsaHangzhouPublicKey);
        $this->setRsaLocalPublicKey($rsaLocalPublicKey);
        $this->setRsaLocalPrivateKey($rsaLocalPrivateKey);
        $this->setClsGlobalOrder($clsGlobalOrder);
        $this->setDb($db);
        $this->setUrl($url);
        if ($this->verifyRsaKey() == false) {
            throw new Exception("RSA公钥或者私钥格式不正确");
        }
    }


    /**
     *一、电子口岸发送数据（加密和生成签名）
     *1、当电子口岸需要向电商服务平台发送请求时，对内容用AES加密，再通过Base64编码（encodeBase64String）
     *2、Signature = RSA(内容, 电子口岸私钥)进行RSA加密，生成数字签名，再通过Base64编码（encodeBase64String）
     *3、最后电子口岸发送请求。
     */
    public function pushOrderToZheJiangCustom($orderId, $payType, $paymentTradeNo)
    {
        $orderInfoToPost = $this->getGlobalOrderDetailForCustom($orderId, $payType, $paymentTradeNo);
        $xmlStr = $this->createOrderXmlToPush($orderInfoToPost);
        $this->requestStr = $xmlStr;
        $xmlToPush = base64_encode($this->AesEncrypt($xmlStr));
        $signature = base64_encode($this->generateRsaSignToPost($xmlStr));
//        echo $this->verifyRsaSign($xmlStr,base64_decode($signature)).PHP_EOL;
        $content = $xmlToPush;
        $dataDigest = $signature;//验签字串
        $msgType = self::BUSINESS_TYPE;//报文类型
        $sendCode = self::COMPANY_CODE;//发送方企业代码	表示报文具体类型,对应报文中的jkfSign节点下的companyCode字段内容

        $url = $this->url;
        $data = compact("content", "msgType", "sendCode", "dataDigest");
        $this->clsGlobalOrder->writeLog("zhe_jiang_custom", $data);
        $client = new SoapClient($url);
        $result = $client->__soapCall("receive", array($data), null);
        $returnArray = json_decode(json_encode($result), true);
        $this->responseStr = json_encode($returnArray);
        $this->clsGlobalOrder->writeLog("zhe_jiang_custom", $returnArray);
        if (empty($returnArray['return'])) {
            throw new Exception("返回值的return字读为空", 402);
        }
        return $returnArray['return'];
    }

    /**
     * 获取订单信息
     */
    public function getGlobalOrderDetailForCustom($orderId, $payType, $paymentTradeNo)
    {
        $_REQUEST['s_orderid'] = $orderId = intval($orderId);
        $detail = $this->clsGlobalOrder->getGlobalOrderNew(null, null, $this->db);
        if (empty($detail)) {
            throw new Exception("订单信息为空", 401);
        }
        $detail = current($detail['data']);
        #todo 单据分为支付宝 和 通联的单据
        if ($payType == self::A_LI_PAY_TYPE) {
            $payCompcode = "312226T001";
            $payCompname = "支付宝（中国）网络技术有限公司";
        } elseif ($payType == self::ALL_IN_PAY_TYPE) {
            $payCompcode = "312226T003";
            $payCompname = "通联支付网络服务股份有限公司";
        } else {
            throw new Exception("支付类型有误", 411);
        }

        $orderInfoToPost = array();
        $orderInfoToPost['payCompanyCode'] = $payCompcode;
        $orderInfoToPost['payNumber'] = $paymentTradeNo;
        $orderInfoToPost['businessNo'] = $detail['globalid'];
        $orderGoodsAmountTmp = sprintf("%.2f", $detail['cast'] / 1.077);
        $orderInfoToPost['orderTotalAmount'] = $detail['cast'];
        $orderInfoToPost['orderNo'] = $detail['globalid'];
        $orderInfoToPost['tradeTime'] = date("Y-m-d H:i:s", $detail['cretime']);
        $orderInfoToPost['consignee'] = $detail['addressInfo']['name'];

        $show_city_arr = $this->clsGlobalOrder->handleOrderAddress($detail['addressInfo']['showCity']);
        $province = $show_city_arr[0];
        $city = $show_city_arr[1];
        $area = $show_city_arr[2];
        $address = str_replace(array($show_city_arr[0], $show_city_arr[1], $show_city_arr[2],), "",
            $detail['addressInfo']['address']);

        $orderInfoToPost['consigneeAddress'] = $province . $city . $area . $address;
        $orderInfoToPost['consigneeTel'] = $detail['addressInfo']['mobilebak'];
        $orderInfoToPost['purchaserId'] = $detail['addressInfo']['uid'];
        $idCard = $detail['addressInfo']['idcardbak'];
        $sql = "SELECT `type` FROM shop_goods_order_global_relation WHERE orderid = '{$orderId}' AND valid = 1";
        $expressType = $this->db->get_value($sql);
        if ($expressType == GLOBAL_ORDER::RELATION_TYPE_UEQ) {
            //ueq
            $logisCompanyName = "广州优宜趣供应链管理有限公司";
            $logisCompanyCode = "4401983261";
        } elseif ($expressType == GLOBAL_ORDER::RELATION_TYPE_DUOLA) {
            //多拉
            $logisCompanyName = "申通快递有限公司";
            $logisCompanyCode = "669437562";
        } else {
            throw new Exception("订单快递有误", 412);
        }
        //UEQ
        //物流企业海关代码 4401983261
        //物流企业名称 广州优宜趣供应链管理有限公司
        //申通
        //物流企业海关代码 669437562
        //物流企业名称 申通快递有限公司

        $orderInfoToPost['logisCompanyName'] = $logisCompanyName;
        $orderInfoToPost['logisCompanyCode'] = $logisCompanyCode;
        $totalNewCastTmp = 0;
        $orderInfoToPost['jkfOrderDetailList'] = array();
        $goodsAmount = 0;
        $nation = $this->nations;
        $totalCount = 0;

        foreach ($detail['productInfo'] as $k => $v) {
            $totalCount += $v['number'];
            $jkfOrderDetail = array();
            $jkfOrderDetail['goodsOrder'] = $k;
            $jkfOrderDetail['goodsName'] = $v['product_name'];
            $jkfOrderDetail['codeTs'] = "2309109000";//商品编码 填写商品对应的HS编码
            $jkfOrderDetail['originCountry'] = $nation[$v['globalcity']];//原产国 todo
//            $jkfOrderDetail['originCountry'] = 601;
            $jkfOrderDetail['barCode'] = $v['barcode'];
            $jkfOrderDetail['note'] = "备注";

            if (!isset($detail['productInfo'][$k + 1])) {
                if ($payType == self::ALL_IN_PAY_TYPE) {
                    $unitPrice = $this->clsGlobalOrder->getGlobalGoodsReportCast($v['id']);
                    if (empty($unitPrice)) {
                        throw new Exception("申报价为空;productId:" . $v['id'], 404);
                    }
                } else {
                    $unitPrice = sprintf("%.2f", ($orderGoodsAmountTmp - $totalNewCastTmp) / $v['number']);
                }
                $goodsAmount += floatval($unitPrice * $v['number']);
                $jkfOrderDetail['unitPrice'] = $unitPrice;
                $jkfOrderDetail['goodsCount'] = $v['number'];
                array_push($orderInfoToPost['jkfOrderDetailList'], $jkfOrderDetail);
                continue;
            }
            if ($v['ifpresent'] == 1) {
                $jkfOrderDetail['unitPrice'] = 0;
                $jkfOrderDetail['goodsCount'] = $v['number'];
                $jkfOrderDetail['note'] = "此款商品为赠品";
                array_push($orderInfoToPost['jkfOrderDetailList'], $jkfOrderDetail);
                continue;
            }
            if ($payType == self::ALL_IN_PAY_TYPE) {
                $unitPrice = $this->clsGlobalOrder->getGlobalGoodsReportCast($v['id']);
                if (empty($unitPrice)) {
                    throw new Exception("申报价为空;productId:" . $v['id'], 404);
                }
            } else {
                $unitPrice = sprintf("%.2f",
                    $orderGoodsAmountTmp * ($v['newcast'] / $detail['totalGoodsNewCastWithOutPresent']) / $v['number']);
            }
            $goodsAmount += floatval($unitPrice * $v['number']);
            $jkfOrderDetail['unitPrice'] = $unitPrice;
            $jkfOrderDetail['goodsCount'] = $v['number'];
            $totalNewCastTmp = $goodsAmount;
            array_push($orderInfoToPost['jkfOrderDetailList'], $jkfOrderDetail);
        }
        $orderInfoToPost['orderGoodsAmount'] = $goodsAmount;
        $orderInfoToPost['totalCount'] = $totalCount;//	包裹中独立包装的物品总数，不考虑物品计量单位
        if ($payType == self::ALL_IN_PAY_TYPE) {
            $orderInfoToPost['totalAmount'] = $orderInfoToPost['orderGoodsAmount'];//成交总价  与订单货款一致
            $orderInfoToPost['orderTaxAmount'] = sprintf("%.2f",
                $orderInfoToPost['totalAmount'] * 0.077);//交易过程中商家向用户征收的税款，按缴税新政计算填写
        } else {
            $orderInfoToPost['totalAmount'] = $orderInfoToPost['orderGoodsAmount'];//成交总价  与订单货款一致
            $orderInfoToPost['orderTaxAmount'] = sprintf("%.2f",
                $detail['cast'] - $orderInfoToPost['orderGoodsAmount']);//交易过程中商家向用户征收的税款，按缴税新政计算填写
        }
        $orderInfoToPost['orderTotalAmount'] = floatval($orderInfoToPost['orderGoodsAmount']) + floatval($orderInfoToPost['orderTaxAmount']);
        $orderInfoToPost['jkfGoodsPurchaser']['id'] = $orderInfoToPost['purchaserId'];
        $orderInfoToPost['jkfGoodsPurchaser']['name'] = $orderInfoToPost['consignee'];
        $orderInfoToPost['jkfGoodsPurchaser']['telNumber'] = $orderInfoToPost['consigneeTel'];
        $orderInfoToPost['jkfGoodsPurchaser']['paperNumber'] = $idCard;
        $this->postCast = $orderInfoToPost['orderTotalAmount'];

        return $orderInfoToPost;
    }

    /**
     * 2.2 电商平台发送商品订单数据到通关服务平台
     * 公司的企业备案编号：3122260D21、企业名称：光橙（上海）信息科技有限公司、海关十位数编码：3122260D21 ; ;DXPID: DXPENT0000016504
     * @param $orderInfoToPost
     * @return mixed
     */
    public function createOrderXmlToPush(array $orderInfoToPost)
    {
        $xmlStr = <<<XML
<?xml version="1.0" encoding="UTF-8"?><mo></mo>
XML;
        $xmlObject = new SimpleXMLElement($xmlStr);
        $xmlObject->addAttribute("version", "1.0.0");
        $xmlObject->addChild("head")->addChild("businessType", "IMPORTORDER");//IMPORTORDER
        $orderInfoXml = $xmlObject->addChild("body")->addChild("orderInfoList")->addChild("orderInfo");
        $jkfSignXml = $orderInfoXml->addChild("jkfSign");
        $jkfSignXml->addChild("companyCode", self::COMPANY_CODE);//必填  发送方备案编号,不可随意填写  公司的企业备案编号：
        $jkfSignXml->addChild("businessNo", $orderInfoToPost['businessNo']);//必填  主要作用是回执给到企业的时候通过这个编号企业能认出对应之前发送的哪个单子
        $jkfSignXml->addChild("businessType", self::BUSINESS_TYPE);//必填 业务类型 IMPORTORDER
        $jkfSignXml->addChild("declareType", "1");//必填 申报类型 企业报送类型。1-新增 2-变更 3-删除。默认为1
        $jkfSignXml->addChild("cebFlag", "01");//可空 对接总署版企业必填；不填或者填写或01表示杭州版报文， 02 表示企业自行生成总署报文， 03委托电子口岸生成总署报文
        $jkfSignXml->addChild("note", "备注");//选填 备注
        $jkfOrderImportHeadXml = $orderInfoXml->addChild("jkfOrderImportHead");
        $jkfOrderImportHeadXml->addChild("eCommerceCode", self::COMPANY_CODE);//必填 电商平台下的商家备案编号
        $jkfOrderImportHeadXml->addChild("eCommerceName", self::COMPANY_NAME);//必填 电商平台下的商家备案名称  光橙（上海）信息科技有限公司
        $jkfOrderImportHeadXml->addChild("ieFlag", "I");//必填  进出口标志  进口 I:进口E:出口
        $jkfOrderImportHeadXml->addChild("payType", "03");//必填 支付类型 01:银行卡支付 02:余额支付 03:其他
        $jkfOrderImportHeadXml->addChild("payCompanyCode", $orderInfoToPost['payCompanyCode']);//必填 支付平台在跨境平台备案编号 todo
        $jkfOrderImportHeadXml->addChild("payNumber", $orderInfoToPost['payNumber']);//必填 支付成功后，支付平台反馈给电商平台的支付单号
        $jkfOrderImportHeadXml->addChild("orderTotalAmount", $orderInfoToPost['orderTotalAmount']);//必填 货款+订单税款+运费+保费
        $jkfOrderImportHeadXml->addChild("orderNo", $orderInfoToPost['orderNo']);//必填 电商平台订单号， 注意：一个订单只能对应一个运单(包裹)
        $jkfOrderImportHeadXml->addChild("orderTaxAmount",
            $orderInfoToPost['orderTaxAmount']);//交易过程中商家向用户征收的税款，按缴税新政计算填写
        $jkfOrderImportHeadXml->addChild("orderGoodsAmount",
            $orderInfoToPost['orderGoodsAmount']);//必填 与成交总价一致，按以电子订单的实际销售价格作为完税价
        $jkfOrderImportHeadXml->addChild("feeAmount", "0");//非必填  交易过程中商家向用户征收的运费，免邮模式填写0
        $jkfOrderImportHeadXml->addChild("insureAmount", "0");//保费  商家向用户征收的保价费用，无保费可填写0
        $jkfOrderImportHeadXml->addChild("companyName", self::COMPANY_NAME); //必填 电商平台在跨境电商通关服务平台的备案名称
        $jkfOrderImportHeadXml->addChild("companyCode", self::COMPANY_CODE);//必填 电商平台在跨境电商通关服务的备案编号 3122260D21
        $jkfOrderImportHeadXml->addChild("tradeTime", $orderInfoToPost['tradeTime']);//必填 格式：2014-02-18 15:58:11
        $jkfOrderImportHeadXml->addChild("currCode", "142");//必填 成交币制 见参数表 142
        $jkfOrderImportHeadXml->addChild("totalAmount", $orderInfoToPost['totalAmount']);//必填 与订单货款一致
//        $jkfOrderImportHeadXml->addChild("consigneeEmail", "收件人邮箱");//非必填
        $jkfOrderImportHeadXml->addChild("consigneeTel", $orderInfoToPost['consigneeTel']);//必填 收件人电话
        $jkfOrderImportHeadXml->addChild("consignee", $orderInfoToPost['consignee']);//必填 收件人
        $jkfOrderImportHeadXml->addChild("consigneeAddress", $orderInfoToPost['consigneeAddress']);//必填 收件人地址
        $jkfOrderImportHeadXml->addChild("totalCount", $orderInfoToPost['totalCount']);//必填  包裹中独立包装的物品总数，不考虑物品计量单位
//        $jkfOrderImportHeadXml->addChild("postMode", "发货方式（物流方式）");//非必填
        $jkfOrderImportHeadXml->addChild("senderCountry", 142);//必填 发件人国别
        $jkfOrderImportHeadXml->addChild("senderName", "谢洋");//必填
        $jkfOrderImportHeadXml->addChild("purchaserId", $orderInfoToPost['purchaserId']);//必填 购买人Id
        $jkfOrderImportHeadXml->addChild("logisCompanyName", $orderInfoToPost['logisCompanyName']);//必填 物流企业备案名称
        $jkfOrderImportHeadXml->addChild("logisCompanyCode", $orderInfoToPost['logisCompanyCode']);//必填 物流企业备案编号
//        $jkfOrderImportHeadXml->addChild("zipCode", "邮编");//非必填
//        $jkfOrderImportHeadXml->addChild("note", "备注信息");//非必填
//        $jkfOrderImportHeadXml->addChild("wayBills", "运单号列表,单号之间分号隔开");//非必填
        $jkfOrderImportHeadXml->addChild("rate", "1");//非必填 汇率，人民币填写1
        $jkfOrderImportHeadXml->addChild("discount", "0");//必填 非现金抵扣金额 使用积分、虚拟货币、代金券等非现金支付金额，无则填写"0"
//        $jkfOrderImportHeadXml->addChild("batchNumbers", "商品批次号");//非必填 商品批次号
//        $jkfOrderImportHeadXml->addChild("consigneeDitrict", "收货地址行政区划代码");//非必填 参照国家统计局公布的国家行政区划标准填制
        $jkfOrderImportHeadXml->addChild("userProcotol",
            "本人承诺所购买商品系个人合理自用，现委托商家代理申报、代缴税款等通关事宜，本人保证遵守《海关法》和国家相关法律法规，保证所提供的身份信息和收货信息真实完整，无侵犯他人权益的行为，以上委托关系系如实填写，本人愿意接受海关、检验检疫机构及其他监管部门的监管，并承担相应法律责任。");//必填
        $jkfOrderDetailListXml = $orderInfoXml->addChild("jkfOrderDetailList");
        foreach ($orderInfoToPost['jkfOrderDetailList'] as $k => $v) {
            $jkfOrderDetailXml = $jkfOrderDetailListXml->addChild("jkfOrderDetail");
            $jkfOrderDetailXml->addChild("goodsOrder", $v['goodsOrder']);//必填 商品序号,序号不大于50
            $jkfOrderDetailXml->addChild("goodsName", $v['goodsName']);//必填  物品名称
//            $jkfOrderDetailXml->addChild("goodsModel", "规格型号");//非必填
            $jkfOrderDetailXml->addChild("codeTs", "2309109000");//填写商品对应的HS编码 固定 2309109000 hs编码
//            $jkfOrderDetailXml->addChild("grossWeight", "毛重");//非必填
            $jkfOrderDetailXml->addChild("unitPrice", $v['unitPrice']);//各商品成交单价*成交数量总和应等于表头的货款、成交总价
            $jkfOrderDetailXml->addChild("goodsUnit", "007");//必填  申报计量单位 	007 代表	个
            $jkfOrderDetailXml->addChild("goodsCount", $v['goodsCount']);//必填 申报数量
            $jkfOrderDetailXml->addChild("originCountry", $v['originCountry']);//必填 原产国 todo
            $jkfOrderDetailXml->addChild("barCode", $v['barCode']);//非必填 国际通用的商品条形码，一般由前缀部分、制造厂商代码、商品代码和校验码组成
            $jkfOrderDetailXml->addChild("currency", "142");//必填 限定为人民币，填写“142”
            $jkfOrderDetailXml->addChild("note", $v['note']);//非必填 促销活动，商品单价偏离市场价格的，可以在此说明。
        }
        $jkfGoodsPurchaserXml = $orderInfoXml->addChild("jkfGoodsPurchaser");
        $jkfGoodsPurchaserXml->addChild("id", $orderInfoToPost['jkfGoodsPurchaser']['id']);//必填 购买人ID
        $jkfGoodsPurchaserXml->addChild("name", $orderInfoToPost['jkfGoodsPurchaser']['name']);//必填 购买人名称
//        $jkfGoodsPurchaserXml->addChild("email", "购买人邮箱");//非必填
        $jkfGoodsPurchaserXml->addChild("telNumber", $orderInfoToPost['jkfGoodsPurchaser']['telNumber']);//必填 telNumber
//        $jkfGoodsPurchaserXml->addChild("address", "地址");//非必填
        $jkfGoodsPurchaserXml->addChild("paperType", "01");//必填 证件类型 01:身份证（试点期间只能是身份证） 02:护照 03:其他
        $jkfGoodsPurchaserXml->addChild("paperNumber", $orderInfoToPost['jkfGoodsPurchaser']['paperNumber']);//必填  证件号码
        $xmlStr = (str_replace(array(
            PHP_EOL,
            "\r\n",
            "\r",
            "\n",
        ), '', $xmlObject->asXML()));
        return $xmlStr;
    }

    /**
     * 验证rsa密钥是否合法
     * @return bool
     */
    public function verifyRsaKey()
    {
        //如果是资源类型就是合法的密钥
        $verifyPublicKey = openssl_pkey_get_public($this->rsaLocalPublicKey);
        $verifyPrivateKey = openssl_pkey_get_private($this->rsaLocalPrivateKey);
        return (!is_resource($verifyPublicKey) || !is_resource($verifyPrivateKey)) ? false : true;
    }

    /**
     * 生成rsa公钥私钥
     * @return string
     */
    public function generateRsaKey()
    {
        $resource = openssl_pkey_new();
        openssl_pkey_export($resource, $privateKey);
        $detail = openssl_pkey_get_details($resource);
        $publicKey = $detail['key'];//公钥
        return $publicKey . "\n" . $publicKey;
    }

    /**
     * RSA 验签
     * 解密出来的数据
     * @param $data
     * @param $sign
     * @return int
     */
    public function verifyRsaSign($data, $sign)
    {
        $publicKey = $this->rsaLocalPublicKey;
        $verifyPublicKey = openssl_pkey_get_public($publicKey);
        //1 valid ; 0 invalid
        return openssl_verify($data, $sign, $verifyPublicKey, OPENSSL_ALGO_SHA1);
    }

    /**
     * 生成RSA签名 用于推送订单
     * @param string $dataToGenerate
     * @return mixed
     */
    public function generateRsaSignToPost($dataToGenerate = "")
    {
        //签名用私钥
        $verifyPrivateKey = $this->rsaLocalPrivateKey;
        openssl_sign($dataToGenerate, $sign, $verifyPrivateKey, OPENSSL_ALGO_SHA1);
        return $sign;
    }

    /**
     * AES 加密
     * @return string
     */
    public function AesEncrypt($input)
    {

        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $input = $this->pkcs5Pad($input, $size);

        return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->aesLocalKey, $input, MCRYPT_MODE_ECB);
    }

    /**
     * 填充方式 pkcs5
     */
    private function pkcs5Pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }


    /**
     * AES解密
     * 使用PKCS5Padding填充方式
     * @param $sStr
     * @return bool|string
     */
    public function aesDecrypt($sStr)
    {
        $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->aesLocalKey, ($sStr), MCRYPT_MODE_ECB);
        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s - 1]);
        $decrypted = substr($decrypted, 0, -$padding);
        return $decrypted;
    }

    /**
     * @param mixed $aesHangzhouKey
     */
    private function setAesHangzhouKey($aesHangzhouKey)
    {
        $this->aesHangzhouKey = base64_decode($aesHangzhouKey);
    }

    /**
     * @param mixed $aesLocalKey
     */
    private function setAesLocalKey($aesLocalKey)
    {
        $this->aesLocalKey = base64_decode($aesLocalKey);
    }

    /**
     * @param mixed $rsaHangzhouPublicKey
     */
    private function setRsaHangzhouPublicKey($rsaHangzhouPublicKey)
    {
        $this->rsaHangzhouPublicKey = $rsaHangzhouPublicKey;
    }

    /**
     * @param mixed $rsaLocalPrivateKey
     */
    private function setRsaLocalPrivateKey($rsaLocalPrivateKey)
    {
        $this->rsaLocalPrivateKey = $rsaLocalPrivateKey;
    }

    /**
     * @param mixed $rsaLocalPublicKey
     */
    private function setRsaLocalPublicKey($rsaLocalPublicKey)
    {
        $this->rsaLocalPublicKey = $rsaLocalPublicKey;
    }

    /**
     * @param mixed $clsGlobalOrder
     */
    private function setClsGlobalOrder($clsGlobalOrder)
    {
        $this->clsGlobalOrder = $clsGlobalOrder;
    }

    /**
     * @param mixed $url
     */
    private function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param mixed $db
     */
    private function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getRequestStr()
    {
        return $this->requestStr;
    }

    /**
     * @return mixed
     */
    public function getResponseStr()
    {
        return $this->responseStr;
    }

    /**
     * @return mixed
     */
    public function getPostCast()
    {
        return $this->postCast;
    }

    /**
     * 测试用例
     */
    private function testDemo()
    {
        //aes 加密 解密
        $this->setAesLocalKey(base64_encode($this->aesHangzhouKey));
        $data = $contentAfertDecrypt = $this->aesDecrypt($this->getContentForTest());
        echo $data . PHP_EOL;
        echo base64_encode($this->AesEncrypt(($contentAfertDecrypt))) . PHP_EOL;

        //rsa 验签名
        $this->setRsaLocalPublicKey($this->rsaHangzhouPublicKey);
        $sign = $this->getRsaSignForTest();
        echo $this->verifyRsaSign($data, $sign) . PHP_EOL;
    }

    /**
     * 获取测试内容 用于测试解密
     * @return bool|string
     */
    private function getContentForTest()
    {
        $content = "v66YKULHFld2JElhm/J9qik2Edr1JHdZIc/k/OesU2GbTX2usXyvF4jGvzvoihrrE8FsfKmllmjsMIjO5fdrS/FD20bYFii4JW3BO3bzshXmz6AEs2DWwG4sK9mNojfOC0IsMoV311X5/JlgUoQXkDy4F5HHpYE9d/xGb0g2XE/hnGSSy2cpQcvQtBlBmixwSckNhsEG92lovlOz8ULwkqG5o7x+qB7P/EMII/WaFAXBJXDXvZX7lmGcOgon6wLhKJLGXorP6BIxOg6LGc6Ux7BAt3i9+0lujNgxIq/sDsl23hsr3yOUpV5C5a813nrHx4HJyd/hBT1UvIUml+eTmJwWCpSfs2cvxIUr0CE57JAZVyXjK13shK3IsZHLPPsm/JcDCrdy0Co/d5uIGJAdzXdsQ56xsju+tlvnA1J6yq2tDIfYK/x6k911A5WXLKYxztD1nq+bTYN3Gv/WFfrzVtgWQBrh06ihS2cwvna0S9EV/YPmhnAjJmrX4trNr9NXQ9xaZaW4lGRg87U5QDV+nQjj1THk0XHFc69N9g2+DsAGyEs9tK6U0ZQ72hJZqZhBCDH1UKw0PLyIhJdxpgPPOWGp8/QVVU2julTeKunvgAAEc3n+GoZfqjsCDi1S6T2MTnjWYWNoFRBhvEZFD/revgpasTOzDQa5NqR1B+mUF70r6uw6MWLJ7cT9Tz3jq+CA";
        $content = base64_decode($content);
        return $content;
    }

    /**
     * 获取测试sign 用于测试解密
     * @return bool|string
     */
    private function getRsaSignForTest()
    {
        $sign = "XHin4uUFqrKDEhKBD/hQisXLFFSxM6EZCvCPqnWCQJq3uEp3ayxmFuUgVE0Xoh4AIWjIIsOWdnaToL1bXvAFKwjCtXnkaRwUpvWrk+Q0eqwsoAdywsVQDEceG5stas1CkPtrznAIW2eBGXCWspOj+aumEAcPyYDxLhDN646Krzw=";
        $sign = base64_decode($sign);
        return $sign;
    }

    private function getXmlForTest()
    {
        $xmlHead = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<mo version=\"1.0.0\"><head>
<businessType>IMPORTORDER</businessType></head><body><orderInfoList><orderInfo><jkfSign><companyCode>3122260D21</companyCode>
<businessNo>order001</businessNo><businessType>IMPORTORDER</businessType><declareType>1</declareType><cebFlag>01</cebFlag><note>进口订单备注</note>
</jkfSign><jkfOrderImportHead><eCommerceCode>33019688oo</eCommerceCode>
<eCommerceName>亚马逊</eCommerceName><ieFlag>I</ieFlag><payType>支付类型</payType>
<payCompanyCode>3301968pay</payCompanyCode><payNumber>zhifu001</payNumber>
<orderTotalAmount>100.0</orderTotalAmount><orderNo>order00001</orderNo>
<orderTaxAmount>10.0</orderTaxAmount><orderGoodsAmount>90.0</orderGoodsAmount>
<feeAmount>5345.0</feeAmount><insureAmount>1.5</insureAmount>
<companyName>天猫国际</companyName><companyCode>3301968833</companyCode><tradeTime>2014-02-17 15:23:13</tradeTime>
<currCode>502</currCode><totalAmount>100.0</totalAmount><consigneeEmail>loujh@sina.com</consigneeEmail>
<consigneeTel>13242345433</consigneeTel><consignee>loujianhua</consignee>
<consigneeAddress>浙江杭州聚龙大厦</consigneeAddress><totalCount>5</totalCount><postMode>1</postMode>
<senderCountry>34233</senderCountry><senderName>yangtest</senderName>
<purchaserId>中国买家a</purchaserId><logisCompanyName>邮政速递</logisCompanyName>
<logisCompanyCode>3301980101</logisCompanyCode><zipCode>322001</zipCode><note>备注信息</note><wayBills>001;002;003</wayBills>
<rate>6.34</rate><discount>0</discount><batchNumbers>3434-343434</batchNumbers>
<consigneeDitrict>632043</consigneeDitrict>
<userProcotol>本人承诺所购买商品系个人合理自用，现委托商家代理申报、代缴税款等通关事宜，本人保证遵守《海关法》和国家相关法律法规，保证所提供的身份信息和收货信息真实完整，无侵犯他人权益的行为，以上委托关系系如实填写，本人愿意接受海关、检验检疫机构及其他监管部门的监管，并承担相应法律责任。</userProcotol>
</jkfOrderImportHead>";
        $xml = $xmlHead . "
<jkfOrderDetailList><jkfOrderDetail><goodsOrder>1</goodsOrder><goodsName>物品名称1</goodsName><goodsModel>规格型号1</goodsModel>
<codeTs>0100000001</codeTs><grossWeight>34.94</grossWeight><unitPrice>3.3</unitPrice><goodsUnit>035</goodsUnit>
<originCountry>00342</originCountry><goodsCount>343.0</goodsCount><barCode>66655554433</barCode><currency>142</currency><note>备注</note></jkfOrderDetail><jkfOrderDetail><goodsOrder>2</goodsOrder><goodsName>物品名称2</goodsName><goodsModel>规格型号2</goodsModel><codeTs>0100000002</codeTs><grossWeight>54.94</grossWeight><unitPrice>3.44</unitPrice><goodsUnit>034</goodsUnit><originCountry>00342</originCountry><goodsCount>343.0</goodsCount><barCode>66655554433</barCode><currency>142</currency><note>备注</note></jkfOrderDetail></jkfOrderDetailList>
<jkfGoodsPurchaser><id>中国买家a</id><name>tetsname</name><email>tetsname@sina.com</email><telNumber>24233322323</telNumber><paperType>01</paperType><address>浙江杭州杭大路9999号</address><paperNumber>23458-9503285382434</paperNumber></jkfGoodsPurchaser></orderInfo></orderInfoList></body></mo>";
        $xml = $xmlHead . "
<jkfOrderDetailList><jkfOrderDetail><goodsOrder>1</goodsOrder><goodsName>物品名称1</goodsName><goodsModel>规格型号1</goodsModel>
<codeTs>0100000001</codeTs><grossWeight>34.94</grossWeight><unitPrice>3.3</unitPrice><goodsUnit>007</goodsUnit>
<originCountry>00342</originCountry><goodsCount>343.0</goodsCount><barCode>66655554433</barCode><currency>142</currency><note>备注</note></jkfOrderDetail><jkfOrderDetail><goodsOrder>2</goodsOrder><goodsName>物品名称2</goodsName><goodsModel>规格型号2</goodsModel><codeTs>0100000002</codeTs><grossWeight>54.94</grossWeight><unitPrice>3.44</unitPrice><goodsUnit>034</goodsUnit><originCountry>00342</originCountry><goodsCount>343.0</goodsCount><barCode>66655554433</barCode><currency>142</currency><note>备注</note></jkfOrderDetail></jkfOrderDetailList>
<jkfGoodsPurchaser><id>中国买家a</id><name>tetsname</name><email>tetsname@sina.com</email><telNumber>24233322323</telNumber><paperType>01</paperType><address>浙江杭州杭大路9999号</address><paperNumber>23458-9503285382434</paperNumber></jkfGoodsPurchaser></orderInfo></orderInfoList></body></mo>";
        // <goodsCount>1</goodsCount><originCountry>601</originCountry><barCode>757946204053</barCode><currency>142</currency><note>备注</note></jkfOrderDetail></jkfOrderDetailList>
        $xml2 = $xmlHead . "
<jkfOrderDetailList><jkfOrderDetail><goodsOrder>0</goodsOrder><goodsName>宝路 成犬饼干250g</goodsName><goodsModel>规格型号1</goodsModel>
<codeTs>2309109000</codeTs><grossWeight>34.94</grossWeight><unitPrice>3.3</unitPrice><unitPrice/><goodsUnit>007</goodsUnit>
<originCountry>00342</originCountry><goodsCount>343.0</goodsCount><barCode>66655554433</barCode><currency>142</currency><note>备注</note></jkfOrderDetail><jkfOrderDetail><goodsOrder>2</goodsOrder><goodsName>物品名称2</goodsName><goodsModel>规格型号2</goodsModel><codeTs>0100000002</codeTs><grossWeight>54.94</grossWeight><unitPrice>3.44</unitPrice><goodsUnit>034</goodsUnit><originCountry>00342</originCountry><goodsCount>343.0</goodsCount><barCode>66655554433</barCode><currency>142</currency><note>备注</note></jkfOrderDetail></jkfOrderDetailList><jkfGoodsPurchaser><id>中国买家a</id><name>tetsname</name><email>tetsname@sina.com</email><telNumber>24233322323</telNumber><paperType>01</paperType><address>浙江杭州杭大路9999号</address><paperNumber>23458-9503285382434</paperNumber></jkfGoodsPurchaser></orderInfo></orderInfoList></body></mo>";
        $xml = (str_replace(array(
            PHP_EOL,
            "\r\n",
            "\r",
            "\n",
        ), '', $xml));
        return $xml;
    }
}
