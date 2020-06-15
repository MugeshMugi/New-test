var $bb = jQuery.noConflict();

function badBrowser(){
	if($bb.browser.msie && parseInt($bb.browser.version) <= 6){ return true;}
	
	return false;
}

function getBadBrowser(c_name)
{
	if (document.cookie.length>0)
	{
	c_start=document.cookie.indexOf(c_name + "=");
	if (c_start!=-1)
		{ 
		c_start=c_start + c_name.length+1; 
		c_end=document.cookie.indexOf(";",c_start);
		if (c_end==-1) c_end=document.cookie.length;
		return unescape(document.cookie.substring(c_start,c_end));
		} 
	}
	return "";
}	

function setBadBrowser(c_name,value,expiredays)
{
	var exdate=new Date();
	exdate.setDate(exdate.getDate()+expiredays);
	document.cookie=c_name+ "=" +escape(value) + ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
}

if(badBrowser() && getBadBrowser('browserWarning') != 'seen' ){
	$bb(function(){
		$bb("<div id='browserWarning'>You are using an <strong>unsupported browser</strong>. Please switch to <a href='https://getfirefox.com'>FireFox</a>, <a href='https://www.opera.com/download/'>Opera</a>, <a href='https://www.apple.com/safari/'>Safari</a> or <a href='https://www.microsoft.com/windows/downloads/ie/getitnow.mspx'>Internet Explorer 8</a>. Thanks!&nbsp;&nbsp;&nbsp;[<a href='#' id='warningClose'>close</a>] </div> ")
			.prependTo("body");
		
		$bb('#warningClose').click(function(){
			setBadBrowser('browserWarning','seen');
			$bb('#browserWarning').slideUp('slow');
			return false;
		});
	});	
}