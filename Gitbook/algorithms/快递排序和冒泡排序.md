quickSort && bubbleSort

php

```
  private function quickSort(array $data)
    {
        $count = count($data);
        if ($count <= 1) {
            return $data;
        }
        $middle = $data[ 0 ];
        $left = $right = [];
        for ($i = 1 ; $i < $count ; $i++) {
            if ($middle < $data[ $i ]) {
                array_push($right, $data[ $i ]);
            } else {
                array_push($left, $data[ $i ]);
            }
        }
        $left = $this->quickSort($left);
        $right = $this->quickSort($right);

        return array_merge($left, [$middle], $right);

    }

    private function bubbleSort(array $data)
    {
        $count = count($data);
        for ($i = 0 ; $i < $count ; $i++) {
            for ($j = 0 ; $j < $count - 1 ; $j++) {
                if ($data[ $j ] > $data[ $j + 1 ]) {
                    $tmp = $data[ $j ];
                    $data[ $j ] = $data[ $j + 1 ];
                    $data[ $j + 1 ] = $tmp;
                }
            }
        }

        return $data;
    }
```



