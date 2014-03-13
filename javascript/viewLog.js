	var xmlClear,xmlClearReadable;
	if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlClear=new XMLHttpRequest();
		xmlClearReadable=new XMLHttpRequest();
        xmlClearGcm=new XMLHttpRequest();
	}
	else
    {// code for IE6, IE5
        xmlClear=new ActiveXObject("Microsoft.XMLHTTP");
        xmlClearReadable=new ActiveXObject("Microsoft.XMLHTTP");
        xmlClearGcm=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlClear.onreadystatechange=function()
		{
            if (xmlClear.readyState==4 && xmlClear.status==200)
            {
                document.getElementById("divLog").innerHTML=xmlClear.responseText;
            }
        };
	xmlClearReadable.onreadystatechange=function()
		{
            if (xmlClearReadable.readyState==4 && xmlClearReadable.status==200)
            {
                document.getElementById("divLogReadable").innerHTML=xmlClearReadable.responseText;
            }
        };
    xmlClearGcm.onreadystatechange=function()
    	{
            if (xmlClearGcm.readyState==4 && xmlClearGcm.status==200)
            {
                document.getElementById("divLogGcm").innerHTML=xmlClearGcm.responseText;
            }
        };
        
    document.getElementById('clear').onclick= function() {
        if(document.getElementById("log_readable").checked)
        {
			xmlClearReadable.open("GET","ajax/clearLogReadable.php",true);
			xmlClearReadable.send();
		}
		if(document.getElementById("log").checked)
		{
			xmlClear.open("GET","ajax/clearLog.php",true);
			xmlClear.send();
		}
        if(document.getElementById("log_gcm").checked)
    	{
			xmlClearGcm.open("GET","ajax/clearLogGcm.php",true);
			xmlClearGcm.send();
		}
	};
    
	function check()
	{
		if(document.getElementById('log_readable').checked)
		{
			document.getElementById('divLog').style.display='none';
			document.getElementById('divLogReadable').style.display='inline';
            document.getElementById('divLogGcm').style.display='none';
		}
		if(document.getElementById('log').checked)
		{
			document.getElementById('divLog').style.display='inline';
			document.getElementById('divLogReadable').style.display='none';
            document.getElementById('divLogGcm').style.display='none';
		}
        if(document.getElementById('log_gcm').checked)
    	{
			document.getElementById('divLog').style.display='none';
			document.getElementById('divLogReadable').style.display='none';
            document.getElementById('divLogGcm').style.display='inline';
		}
	}
