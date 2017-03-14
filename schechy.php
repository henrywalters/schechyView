<script>


//data = {
//	id: 'div_id',
//  time: [0,1,2,3,4,5,5,6,7]
//  jobs: [{data:[0,1,2,3],color:red},..]
//  fontStyle: '16px arial'
//  pixelBuffer: 12
//}
function jobTimeSeries(data){
	var width = $('#' + data.id).width();
	var height = $('#' + data.id).height();
	console.log(width);
	var fontSize = $('#' + data.id).css('fontSize');
	var maxWidth = 0;
	for (var job in data.range){
		maxWidth = ((data.range[job].width(data.fontStyle) > maxWidth) ? data.range[job].width(data.fontStyle) : maxWidth);
	}
	var segment = (width/(maxWidth)) + data.pixelBuffer;
	var headers = [];
	var chart = [];
	for (var i = 0; i < data.range.length; i++){
		console.log(segment);
		headers.push($('<div>' + data.range[i] + '</div>').css({'margin-left':segment + (maxWidth/2.0),'text-align':'center', 'display':'inline','width':segment*2, 'min-width':segment}).appendTo('#' + data.id));
	}
	$('#'+data.id).append('<br>');
	for (job in data.jobs){
		for (var i = 0; i < data.range.length; i++){
			if (data.jobs[job].data.indexOf(data.range[i]) != -1){
				chart.push($('<div></div>').css({'background-color':data.jobs[job].color,'height':'20px','margin-left':(segment*2) + (maxWidth),'text-align':'center', 'display':'inline','width':segment*2+'px', 'min-width':segment}).appendTo('#' + data.id));
			}
			else {
				chart.push($('<div></div>').css({'background-color':'blue','height':'20px','margin-left':(segment*2) + (maxWidth),'text-align':'center', 'display':'inline','width':segment*2 + 'px', 'min-width':segment}).appendTo('#' + data.id));
			}
		}
		$('#'+data.id).append('<br>');
	}
}


String.prototype.width = function(font) {
	  var f = font || '12px arial',
	      o = $('<div>' + this + '</div>')
	            .css({'position': 'absolute', 'float': 'left', 'white-space': 'nowrap', 'visibility': 'hidden', 'font': f})
	            .appendTo($('body')),
	      w = o.width();

	  o.remove();

	  return w;
	}

</script>
