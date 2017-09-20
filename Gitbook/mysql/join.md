```
EXPLAIN
SELECT
	sgms.colorid,
	sgms.sizeid,
	sgs.productid,
	sgs.sgmsid,
	sgsm.outcost,
	sgsm.orderid
FROM
	shop_goods_salelog sgs
LEFT JOIN shop_goods_multi_sized sgms ON (sgs.productid = sgms.productid AND sgs.sgmsid = sgms.id)
LEFT JOIN shop_goods_shipment sgsm ON (sgs.productid = sgsm.productid AND sgs.orderid = sgsm.orderid AND sgsm.valid = 1)
WHERE
	sgs.orderid = 34476347
AND sgs.valid = 1
```