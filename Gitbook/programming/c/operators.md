you can replace the expressions
```
	i = i + 1
	j = j - 10
	k = k * (n + 1)
	a[i] = a[i] / b
```
with
```
	i += 1
	j -= 10
	k *= n + 1
	a[i] /= b
```

```
	k = 2 * ++i
```
means ``add one to i, store the result back in i, multiply it by 2, and store that result in k.''
i+1 加完1后的值返回 再乘2

```
	k = 2 * i++
```
means ``take i's old value and multiply it by 2, increment i, store the result of the multiplication in k.''
旧的i值乘以2 赋值给k 再给i+1


