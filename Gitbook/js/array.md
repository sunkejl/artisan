JavaScript使用一个32位整数，保存数组的元素个数。这意味着，数组成员最多只有4294967295个（2的32次方- 1）个，也就是说

`length`属性的最大值就是4294967295。 转换成二进制 就是32个1

只要是数组，就一定有`length`属性。该属性是一个动态的值，等于键名中的最大整数加上`1`。 可以不连续设置键名 没设置过的为undefine

将数组清空的一个有效方法，就是将`length`属性设为0。

检查某个键名是否存在的运算符`in`，适用于对象，也适用于数组

var a=\["a","b","c"\];

console.log\(2 in a\);//true 键

console.log\(5 in a\); // false

```javascript
const locationds = ['Austin', 'New York', 'San Francisco'];
locationds.forEach((locationd) => {
console.log(locationd);
});
```

