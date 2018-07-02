
<html><head>
<style>
#canvas{
	
	
}
</style>
</head><body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<div style="position:absolute;top:10px;left:16px;width:400px;height:300px;">
<canvas  id="canvas"></canvas>
</div>
<script>
$(document).ready(function(){
	$.ajax(
	{
		
		url:"http://localhost/lunchbox_new/data.php",
         method: "GET",
		 dataType:'json',
        success: function(data){
			console.log(data);
			var name=[];
			var amount=[];
			var i=0;
			while(i<data.length){
				name.push(data[i].email);
				amount.push(data[i].amount);
				i++;
			}
			var chart={
				labels: name,
				datasets:[
				{
					label: "amount",
					backgroundColor: 'rgb(255, 255,255,0.5)',
                    borderColor: 'rgb(255, 99, 132)',
					data: amount
				}
				]
				
			};
			var ctx=$("#canvas");
			
			var Linegraph=new Chart(ctx,{
				type: 'line',
				data: chart
			});
			
		},
        error: function(){
			console.log(data.records);
		}		
	});
});
</script>
</body></html>
