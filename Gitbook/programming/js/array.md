JavaScript使用一个32位整数，保存数组的元素个数。这意味着，数组成员最多只有4294967295个（2的32次方- 1）个，也就是说

`length`属性的最大值就是4294967295。 转换成二进制 就是32个1

只要是数组，就一定有`length`属性。该属性是一个动态的值，等于键名中的最大整数加上`1`。 可以不连续设置键名 没设置过的为undefine

将数组清空的一个有效方法，就是将`length`属性设为0。

检查某个键名是否存在的运算符`in`，适用于对象，也适用于数组

var a=\["a","b","c"\];

console.log\(2 in a\);//true 键

console.log\(5 in a\); // false

```
const locationds = ['Austin', 'New York', 'San Francisco'];
locationds.forEach((locationd) => {
console.log(locationd);
});
```

var array=new Array();
 
var array=[];
 
var array=[1,2,3]; 数组里可以是数字 对象 字符串
 
arr.length  数组的长度
 
arr.indexOf()  查找某个元素
 
arr.forEach(callback) 遍历数组 每遍历一个执行callback函数
var edit=function(item index,array){
item.score+=5
}
students.foreach(edit)
 
arr.reverser() 倒序排一下
 
自定义排序
arr.sort(compareFunction)  回调函数可以不传
var byScore=function(a,b){
        return b.score-a.score
}
students.sort(byScore);
 
 
arr.push({id:14,num:20}) 往后数组后面加
 
arr.unshift() 往数组前面加
 
arr.shift() 拿到第一个元素 第一个元素删掉
 
arr.pop() 拿到最后一个 最后一个删除
 
arr.splice(1，1，2) 从哪个位置开始删掉几个 插入新的元素 删了没加就是删除的效果，还可以不删 插入
 
以下不会修改原数组
arr.slice() 复制一部分数组出来
 
arr.concat() 合并数组
 
str.split(";") 字符串变数组
 
arr.join(";") 输出字符串 默认是,
 
arr.map()
 
arr.reduce()
