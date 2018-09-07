/*
日历组件
<input type="text" class="txt" name="endtime" value="<!--{$notice.endtime|date_format:"%Y-%m-%d %H:%M:%S"}-->" onclick="showcalendar(event, this)">
*/

var controlid = null;
var currdate = null;
var startdate = null;
var enddate  = null;
var yy = null;
var mm = null;
var hh = null;
var ii = null;
var currday = null;
var addtime = false;
var today = new Date();
var lastcheckedyear = false;
var lastcheckedmonth = false;
var isage = false;

function _cancelBubble(event) {
	e = event ? event : window.event;
	if(!e) return;
	if(_getBrowser().msie) {
		e.returnValue = false;
		e.cancelBubble = true;
	} else if(e) {
		e.stopPropagation();
		e.preventDefault();
	}
}
function _fetchOffset(obj) {
	var left_offset = 0, top_offset = 0;

	if(obj.getBoundingClientRect){
		var rect = obj.getBoundingClientRect();
		var scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
		var scrollLeft = Math.max(document.documentElement.scrollLeft, document.body.scrollLeft);
		if(document.documentElement.dir == 'rtl') {
			scrollLeft = scrollLeft + document.documentElement.clientWidth - document.documentElement.scrollWidth;
		}
		left_offset = rect.left + scrollLeft - document.documentElement.clientLeft;
		top_offset = rect.top + scrollTop - document.documentElement.clientTop;
	}
	if(left_offset <= 0 || top_offset <= 0) {
		left_offset = obj.offsetLeft;
		top_offset = obj.offsetTop;
		while((obj = obj.offsetParent) != null) {
			left_offset += obj.offsetLeft;
			top_offset += obj.offsetTop;
		}
	}
	return { 'left' : left_offset, 'top' : top_offset };
}

function loadcalendar() {
	s = '';
	s += '<div id="calendar" style="display:none; position:absolute; z-index:100000;" onclick="_cancelBubble(event)">';
	s += '<div style="width: 210px;"><table cellspacing="0" cellpadding="0" width="100%" style="text-align: center;">';
	s += '<tr align="center" id="calendar_week"><td><a href="###" onclick="refreshcalendar(yy, mm-1)" title="上一月">&laquo;</a></td><td colspan="5" style="text-align: center"><a href="###" onclick="showdiv(\'year\');_cancelBubble(event)" class="dropmenu" title="点击选择年份" id="year"></a>&nbsp; - &nbsp;<a id="month" class="dropmenu" title="点击选择月份" href="###" onclick="showdiv(\'month\');_cancelBubble(event)"></a></td><td><A href="###" onclick="refreshcalendar(yy, mm+1)" title="下一月">&raquo;</A></td></tr>';
	s += '<tr id="calendar_header"><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td></tr>';
	for(var i = 0; i < 6; i++) {
		s += '<tr>';
		for(var j = 1; j <= 7; j++)
			s += "<td id=d" + (i * 7 + j) + " height=\"19\">0</td>";
		s += "</tr>";
	}
	s += '<tr id="hourminute"><td colspan="7" align="center"><input type="text" size="2" value="" id="hour" class="txt" onKeyUp=\'this.value=this.value > 23 ? 23 : zerofill(this.value);controlid.value=controlid.value.replace(/\\d+(\:\\d+)/ig, this.value+"$1")\'> 点 <input type="text" size="2" value="" id="minute" class="txt" onKeyUp=\'this.value=this.value > 59 ? 59 : zerofill(this.value);controlid.value=controlid.value.replace(/(\\d+\:)\\d+/ig, "$1"+this.value)\'> 分</td></tr>';
	s += '</table></div></div>';
	s += '<div id="calendar_year" onclick="_cancelBubble(event)" style="display: none;z-index:100001;"><div class="col">';
	for(var k = 2020; k >= 1931; k--) {
		s += k != 2020 && k % 10 == 0 ? '</div><div class="col">' : '';
		s += '<a href="###" onclick="refreshcalendar(' + k + ', mm);document.getElementById(\'calendar_year\').style.display=\'none\'"><span' + (today.getFullYear() == k ? ' class="calendar_today"' : '') + ' id="calendar_year_' + k + '">' + k + '</span></a><br />';
	}
	s += '</div></div>';
	s += '<div id="calendar_month" onclick="_cancelBubble(event)" style="display: none;z-index:100001;">';
	for(var k = 1; k <= 12; k++) {
		s += '<a href="###" onclick="refreshcalendar(yy, ' + (k - 1) + ');document.getElementById(\'calendar_month\').style.display=\'none\'"><span' + (today.getMonth()+1 == k ? ' class="calendar_today"' : '') + ' id="calendar_month_' + k + '">' + k + ( k < 10 ? '&nbsp;' : '') + ' 月</span></a><br />';
	}
	s += '</div>';
	if(_getBrowser().msie && _getBrowser().version < 7) {
		s += '<iframe id="calendariframe" frameborder="0" style="display:none;position:absolute;filter:progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)"></iframe>';
		s += '<iframe id="calendariframe_year" frameborder="0" style="display:none;position:absolute;filter:progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)"></iframe>';
		s += '<iframe id="calendariframe_month" frameborder="0" style="display:none;position:absolute;filter:progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)"></iframe>';
	}

	var div = document.createElement('div');
	div.innerHTML = s;
	document.getElementById('append_parent').appendChild(div);
	document.onclick = function(event) {
		document.getElementById('calendar').style.display = 'none';
		document.getElementById('calendar_year').style.display = 'none';
		document.getElementById('calendar_month').style.display = 'none';
		if(_getBrowser().msie && _getBrowser().version < 7) {
			document.getElementById('calendariframe').style.display = 'none';
			document.getElementById('calendariframe_year').style.display = 'none';
			document.getElementById('calendariframe_month').style.display = 'none';
		}
	};
	document.getElementById('calendar').onclick = function(event) {
		_cancelBubble(event);
		document.getElementById('calendar_year').style.display = 'none';
		document.getElementById('calendar_month').style.display = 'none';
		if(_getBrowser().msie && _getBrowser().version < 7) {
			document.getElementById('calendariframe_year').style.display = 'none';
			document.getElementById('calendariframe_month').style.display = 'none';
		}
	};
}

function parsedate(s) {
	/(\d+)\-(\d+)\-(\d+)\s*(\d*):?(\d*)/.exec(s);
	var m1 = (RegExp.$1 && RegExp.$1 > 1899 && RegExp.$1 < 2101) ? parseFloat(RegExp.$1) : today.getFullYear();
	var m2 = (RegExp.$2 && (RegExp.$2 > 0 && RegExp.$2 < 13)) ? parseFloat(RegExp.$2) : today.getMonth() + 1;
	var m3 = (RegExp.$3 && (RegExp.$3 > 0 && RegExp.$3 < 32)) ? parseFloat(RegExp.$3) : today.getDate();
	var m4 = (RegExp.$4 && (RegExp.$4 > -1 && RegExp.$4 < 24)) ? parseFloat(RegExp.$4) : 0;
	var m5 = (RegExp.$5 && (RegExp.$5 > -1 && RegExp.$5 < 60)) ? parseFloat(RegExp.$5) : 0;
	/(\d+)\-(\d+)\-(\d+)\s*(\d*):?(\d*)/.exec("0000-00-00 00\:00");
	return new Date(m1, m2 - 1, m3, m4, m5);
}

function settime(d) {
	document.getElementById('calendar').style.display = 'none';
	document.getElementById('calendar_month').style.display = 'none';
	if(_getBrowser().msie && _getBrowser().version < 7) {
		document.getElementById('calendariframe').style.display = 'none';
	}
	controlid.value = yy + "-" + zerofill(mm + 1) + "-" + zerofill(d) + (addtime ? ' ' + zerofill(document.getElementById('hour').value) + ':' + zerofill(document.getElementById('minute').value) : '');
	if(isage){
		var now = new Date().getTime(), 
			date = new Date(yy + '/' + zerofill(mm + 1) + '/' + zerofill(d)).getTime();
		var diff = parseInt((now - date)/(86400*30*1000)),
			year = parseInt(diff/12),
			month = diff%12;
		if(0 != month){
			document.getElementById('carage').innerHTML = '车龄：' + year + '年' + month + '个月';
		}else{
			document.getElementById('carage').innerHTML = '车龄：' + year + '年';
		}
	}
}

function showcalendar(isAge, event, controlid1, addtime1, startdate1, enddate1) {
	controlid = controlid1;
	addtime = addtime1;
	startdate = startdate1 ? parsedate(startdate1) : false;
	enddate = enddate1 ? parsedate(enddate1) : false;
	currday = controlid.value ? parsedate(controlid.value) : today;
	isage = isAge == 1 ? true : false;
	hh = currday.getHours();
	ii = currday.getMinutes();
	var p = _fetchOffset(controlid);
	document.getElementById('calendar').style.display = 'block';
	document.getElementById('calendar').style.left = p['left']+'px';
	document.getElementById('calendar').style.top	= (p['top'] + 20)+'px';
	_cancelBubble(event);
	refreshcalendar(currday.getFullYear(), currday.getMonth());
	if(lastcheckedyear != false) {
		document.getElementById('calendar_year_' + lastcheckedyear).className = 'calendar_default';
		document.getElementById('calendar_year_' + today.getFullYear()).className = 'calendar_today';
	}
	if(lastcheckedmonth != false) {
		document.getElementById('calendar_month_' + lastcheckedmonth).className = 'calendar_default';
		document.getElementById('calendar_month_' + (today.getMonth() + 1)).className = 'calendar_today';
	}
	document.getElementById('calendar_year_' + currday.getFullYear()).className = 'calendar_checked';
	document.getElementById('calendar_month_' + (currday.getMonth() + 1)).className = 'calendar_checked';
	document.getElementById('hourminute').style.display = addtime ? '' : 'none';
	lastcheckedyear = currday.getFullYear();
	lastcheckedmonth = currday.getMonth() + 1;
	if(_getBrowser().msie && _getBrowser().version < 7) {
		document.getElementById('calendariframe').style.top = document.getElementById('calendar').style.top;
		document.getElementById('calendariframe').style.left = document.getElementById('calendar').style.left;
		document.getElementById('calendariframe').style.width = document.getElementById('calendar').offsetWidth;
		document.getElementById('calendariframe').style.height = document.getElementById('calendar').offsetHeight;
		document.getElementById('calendariframe').style.display = 'block';
	}
}

function refreshcalendar(y, m) {
	var x = new Date(y, m, 1);
	var mv = x.getDay();
	var d = x.getDate();
	var dd = null;
	yy = x.getFullYear();
	mm = x.getMonth();
	document.getElementById("year").innerHTML = yy;
	document.getElementById("month").innerHTML = mm + 1 > 9  ? (mm + 1) : '0' + (mm + 1);

	for(var i = 1; i <= mv; i++) {
		dd = document.getElementById("d" + i);
		dd.innerHTML = "&nbsp;";
		dd.className = "";
	}

	while(x.getMonth() == mm) {
		dd = document.getElementById("d" + (d + mv));
		dd.innerHTML = '<a href="###" onclick="settime(' + d + ');return false">' + d + '</a>';
		if(x.getTime() < today.getTime() || (enddate && x.getTime() > enddate.getTime()) || (startdate && x.getTime() < startdate.getTime())) {
			dd.className = 'calendar_expire';
		} else {
			dd.className = 'calendar_default';
		}
		if(x.getFullYear() == today.getFullYear() && x.getMonth() == today.getMonth() && x.getDate() == today.getDate()) {
			dd.className = 'calendar_today';
			dd.firstChild.title = '今天';
		}
		if(x.getFullYear() == currday.getFullYear() && x.getMonth() == currday.getMonth() && x.getDate() == currday.getDate()) {
			dd.className = 'calendar_checked';
		}
		x.setDate(++d);
	}

	while(d + mv <= 42) {
		dd = document.getElementById("d" + (d + mv));
		dd.innerHTML = "&nbsp;";
		d++;
	}

	if(addtime) {
		document.getElementById('hour').value = zerofill(hh);
		document.getElementById('minute').value = zerofill(ii);
	}
}

function showdiv(id) {
	var p = _fetchOffset(document.getElementById(id));
	document.getElementById('calendar_' + id).style.left = p['left']+'px';
	document.getElementById('calendar_' + id).style.top = (p['top'] + 16)+'px';
	document.getElementById('calendar_' + id).style.display = 'block';
	if(_getBrowser().msie && _getBrowser().version < 7) {
		document.getElementById('calendariframe_' + id).style.top = document.getElementById('calendar_' + id).style.top;
		document.getElementById('calendariframe_' + id).style.left = document.getElementById('calendar_' + id).style.left;
		document.getElementById('calendariframe_' + id).style.width = document.getElementById('calendar_' + id).offsetWidth;
		document.getElementById('calendariframe_' + id ).style.height = document.getElementById('calendar_' + id).offsetHeight;
		document.getElementById('calendariframe_' + id).style.display = 'block';
	}
}

function zerofill(s) {
	var s = parseFloat(s.toString().replace(/(^[\s0]+)|(\s+$)/g, ''));
	s = isNaN(s) ? 0 : s;
	return (s < 10 ? '0' : '') + s.toString();
}

loadcalendar();