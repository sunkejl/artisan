```php
<?
        $arr = range(9, 0);
        $n = count($arr);
        for ($gap = intval($n / 2); $gap > 0; $gap = intval($gap / 2)) {
            for ($i = $gap; $i < $n; $i++) {
                for ($j = $i - $gap; $j >= 0 && $arr[$j] > $arr[$j + $gap]; $j -= $gap) {
                    $temp = $arr[$j];
                    $a[$j] = $arr[$j + $gap];
                    $a[$j + $gap] = $temp;
                }
            }
        }
        var_dump("END");
        var_dump($arr);
```