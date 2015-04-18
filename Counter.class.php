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
	public function __construct() {
		if (file_exists($this->filePath)) {
			return true;
		} else {
			file_put_contents($this->filePath, "");
			return true;
		}
	}

	/**
	 * 读取计时器文件中的内容，并转化为json格式数据
	 * @return array $arr
	 */
	private function Read() {
		$txt = file_get_contents($this->filePath);
		$arr = json_decode($txt, true);
		return $arr;
	}

	/**
	 * 再计数器数组转化为json格式后，写入文件中
	 * @param array $arr
	 * @return boolean
	 */
	private function Write($arr) {
		$jsonStr = json_encode($arr);
		file_put_contents($this->filePath, $jsonStr);
		return true;
	}

	/**
	 * 创建一个计数器，默认值为0，
	 * 如果已经存在该计数器，则创建失败
	 * @param string $name
	 * @param integer $value
	 * @return boolean
	 */
	public function Create($name, $value = 0) {
		$arr = self::Read();

		if (@array_key_exists($name, $arr)) {
			return false;
		} else {
			$arr[$name] = $value;
			if (self::Write($arr)) {
				return true;
			}
		}
	}

	/**
	 * 根据计数器名，获取计数器的值
	 * @param string $name
	 * @return integer $value
	 */
	public function Get($name) {
		$arr = self::Read();

		if (array_key_exists($name, $arr)) {
			return $arr[$name];
		} else {
			return false;
		}
	}

	/**
	 * 根据计数器名，设置计数器的值
	 * @param string $name
	 * @param integer $value
	 * @return boolean
	 */
	public function Set($name, $value) {
		$arr = self::Read();

		if (array_key_exists($name, $arr)) {
			$arr[$name] = $value;
			if (self::Write($arr)) {
				return true;
			}
		} else {
			return false;
		}
	}
	
	/**
	 * 根据计数器名，计时器的值+1
	 * @param string $nane
	 * @return integer $value
	 */
	public function Incr($name) {
		$arr = self::Read();
		if (array_key_exists($name, $arr)) {
			$arr[$name]++;
			if (self::Write($arr)) {
				return $arr[$name];
			}
		} else {
			return false;
		}
	}

	/**
	 * 根据计数器名，计时器的值-1
	 * @param string $nane
	 * @return integer $value
	 */
	public function Decr($name) {
		$arr = self::Read();
		if (array_key_exists($name, $arr)) {
			$arr[$name]--;
			if (self::Write($arr)) {
				return $arr[$name];
			}
		} else {
			return false;
		}
	}

	/**
	 * 删除一个计数器
	 * @param string $name
	 * @return boolean
	 */
	public function Remove($name) {
		$arr = self::Read();
		if (array_key_exists($name, $arr)) {
			unset($arr[$name]);
			if (self::Write($arr)) {
				return true;
			}
		} else {
			return false;
		}
	}

}

?>

