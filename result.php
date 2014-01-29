<?php
	header('Content-Type: text/plain');
	
	$name = array('3'	=> 'Fizz',
				  '5'	=> 'Buzz');
	
	echo "RESULT FROM FIRST TASK\n\r";
	echo task1(12,16,3,5,$name)."\n";
	echo task1(4,11,3,5,$name)."\n\r\r";
	echo corrections();
	
	function task1($start, $end, $multiple1, $multiple2, $arr)
	{
		$result = null;
		if(isPositiveInteger($start) && isPositiveInteger($end) && isPositiveInteger($multiple1) && isPositiveInteger($multiple2) && ((is_array($arr)) || ($arr instanceof Traversable)))
		{
			for($i=$start;$i<=$end;$i++)
			{
				if($i%$multiple1!=0 && $i%$multiple2!=0) 
				{
					$instr = substr(trim($result), -strlen($arr[$multiple1].chr(32).$arr[$multiple2]));
					$result .= ($instr == $arr[$multiple2].chr(32).$arr[$multiple1] || $instr == $arr[$multiple1].chr(32).$arr[$multiple2]) ? "Bazz" : $i;
				} else {
					if($i%$multiple1==0 && $i%$multiple2==0) 
					{
						$result .= $arr[$multiple1].$arr[$multiple2];
					} else {
						if($i%$multiple1==0) {
							$result .= $arr[$multiple1];
						} else if($i%$multiple2==0) {
							$result .= $arr[$multiple2];
						}
					}
				}
				if($i<$end) $result .= chr(32);
			}
		} else {
			$result = "Invalid parameter";
		}
		return $result;
	}
	
	function isPositiveInteger($val)
	{
		return is_numeric($val) && $val >= 0;
	}
	
	function corrections() 
	{
		return 	"THESE IS THE FOLLOWING CORRECTIONS THAT I FOUND\n\r".
				"[data.sql]\n".
				"-\tCan't create table 'HDB'\n".
				"\tReason: InnoDB engine generates an error, it should MyISAM\n".
				"-\tCan't create table 'Condo'\n".
				"\tReason: -	InnoDB engine generates an error, it should MyISAM\n".
				"\t\t-\tIncorrect table definition, there can be only one auto column and it must be defined as a key\n\r".
				"[getinfo.php]\n".
				"-	unexpected ')' in getinfo.php on line 4\n".
				"-	Can't use function return value in write context in getinfo.php on line 8\n".
				"\tif (is_object($data) == true) $status = '200 OK';\n".
				"-	Class 'dataObj' not found in getinfo.php on line 6\n".
				"-	Can't use $ArrayURL[1] as parameter because ".chr(36)."ArrayURL[1] = domain. Replace ".chr(36)."ArrayURL[1] with ".chr(36)."_GET[".chr(34)."id".chr(34)."]\n\r".
				"[data.php]\n".
				"-	Call to a member function fetch_assoc() on a non-object in data.php on line 23\n".
				"-	private $table = null; must be defined\n".
				"-	SELECT * FROM ".chr(36)."table WHERE ID = ".chr(36)."id (replace ".chr(36)."table with ".chr(36)."this->table)"; 
	}
	
?>