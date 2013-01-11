

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
//<![CDATA[

var province_id = <?php echo isset($_POST['province_id']) ? intval($_POST['province_id']) : '0'; ?>;
var amphur_id = <?php echo isset($_POST['amphur_id']) ? intval($_POST['amphur_id']) : '0'; ?>;
var district_id = <?php echo isset($_POST['district_id']) ? intval($_POST['district_id']) : '0'; ?>;

function loadSelectBox(id,url,selected){
	$.get(
		url,{},function(data){
			$(id).html(data);
			if (selected!=0){
				$(id+' option[value='+selected+']').attr('selected','selected');
			}
		}
	);
}

$(function(){
	loadSelectBox(
			'#province_id',
			'geo_combo.php?load=province',
			province_id
	);
	loadSelectBox(
			'#amphur_id',
			'geo_combo.php?load=amphur&province_id='+province_id,
			amphur_id
	);
	loadSelectBox(
			'#district_id',
			'geo_combo.php?load=district&amphur_id='+amphur_id,
			district_id
	);
	$('#province_id').change(function(e){
		var selected = e.target.value;
		loadSelectBox(
			'#amphur_id',
			'geo_combo.php?load=amphur&province_id='+selected,
			0
		);
		$('#district_id :not(option:first)').remove(); //add
	});
	$('#amphur_id').change(function(e){
		var selected = e.target.value;
		loadSelectBox(
			'#district_id',
			'geo_combo.php?load=district&amphur_id='+selected,
			0
		);
	});
});
//]]>
</script>

<script type="text/javascript">
 // Specify a function to execute when the DOM is fully loaded.
$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#selProvince').change(function() {
		$("#selAmphur").html(defaultOption);
		$("#selTumbon").html(defaultOption);
		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "jsonAction.php",
			// Data to be sent to the server.
			data: ({ nextList : 'amphur', provinceID: $('#selProvince').val() }),
			// The type of data that you're expecting back from the server.
			dataType: "json",
			// beforeSend is called before the request is sent
			beforeSend: function() {
				$("#waitAmphur").html(loadingImage);
			},
			// success is called if the request succeeds.
			success: function(json){
				$("#waitAmphur").html("");
				// Iterate over a jQuery object, executing a function for each matched element.
				$.each(json, function(index, value) {
					// Insert content, specified by the parameter, to the end of each element
					// in the set of matched elements.
					 $("#selAmphur").append('<option value="' + value.AMPHUR_ID + 
											'">' + value.AMPHUR_NAME + '</option>');
				});
			}
		});
	});
	
	$('#selAmphur').change(function() {
		$("#selTumbon").html(defaultOption);
		$.ajax({
			url: "jsonAction.php",
			data: ({ nextList : 'tumbon', amphurID: $('#selAmphur').val() }),
			dataType: "json",
			beforeSend: function() {
				$("#waitTumbon").html(loadingImage);
			},
			success: function(json){
				$("#waitTumbon").html("");
				$.each(json, function(index, value) {
					 $("#selTumbon").append('<option value="' + value.DISTRICT_ID + 
											'">' + value.DISTRICT_NAME + '</option>');
				});
			}
		});
	});
});
</script>
