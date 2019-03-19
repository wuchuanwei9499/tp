<!--
	function resultchk()
	{
		var e_result = document.getElementById('e_result');
		if (e_result.value.length<1)
		{
			alert('分数不能为空');
			return false;
		}
		var reg = /^([0-9]|[0-9][0-9]|100)$/;
		if(!(reg.test(e_result.value)))
		{
			alert("分数必须为0-100 必须是整数");
			e_result.focus();
			e_result.value='';
			return false;
		}
	}
-->