# Counter
### PHP计数器，可以用来记录访问次数统计、相册计数、评论计数等。

#### 使用实例
```php
<?php
$c = new Counter();
$c->Create('sum');
$c->Create('num', 10);
$c->Get('sum'); //返回0
$c->Set('num'); //返回100
$c->Incr('sum'); //返回1
$c->Decr('num'); //返回99
?>
```

#### 源码说明
```php
<?php
/**
 * @author <eric@lishengcn.cn>
 * @version 1.0
 */
class Counter
{
    private $filePath = "counter.txt";

	/**
	 * 构造函数检查计数器文件是否存在
	 * 如果不存在，就创建
	 */
	public function __construct() {}

	/**
	 * 读取计时器文件中的内容，并转化为json格式数据
	 */
	private function Read() {}

	/**
	 * 再计数器数组转化为json格式后，写入文件中
	 */
	private function Write(array $arr) {}

	/**
	 * 创建一个计数器，默认值为0，
	 * 如果已经存在该计数器，则创建失败
	 */
	public boolean function Create(string $name, [int $value = 0]) {}

	/**
	 * 根据计数器名，获取计数器的值
	 */
	public int function Get(string $name) {}

	/**
	 * 根据计数器名，设置计数器的值
	 */
	public boolean function Set(string $name, int $value) {}
	
	/**
	 * 根据计数器名，计时器的值+1
	 */
	public int function Incr(string $name) {}

	/**
	 * 根据计数器名，计时器的值-1
	 */
	public int function Decr(string $name) {}

	/**
	 * 删除一个计数器
	 */
	public boolean function Remove(string $name) {}

}


?>
```

#### 关于作者
[<eric@lishengcn.cn>](http://www.lishengcn.cn) 

