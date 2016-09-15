function addModule(checkbox, ival){
	checkbox = typeof checkbox == "undefined" ? "" : (checkbox == 1 ? "checked" : "");
	ival = typeof ival == "undefined" ? "" : ival;
	$("#module-tb").append("<tr>\
								<td>\
									<div class=\"input-group\">\
										<span class=\"input-group-addon\">\
										<input onchange='masterchange();' type=\"checkbox\" aria-label=\"...\" name=\"module-input-check[]\" "+ checkbox +"></span>\
										<input onchange='masterchange();' type=\"text\" class=\"form-control\" aria-label=\"...\" name=\"module-input-text[]\" value=\""+ ival +"\">\
									</div><!-- /input-group -->\
								</td>\
								<td>\
									<img onclick=\"copyModule(this);\" onchange='masterchange();' style=\"cursor:pointer;width:23px;height:23px;vertical-align:bottom;\" src=\"copy.png\"/>\
								</td>\
								<td>\
									<img onclick=\"destroyTR(this);\" class=\"icons\" src=\"trash.png\"/>\
								</td>\
							</tr>");	
}

function addExport(checkbox, ival, itext){
	checkbox = typeof checkbox == "undefined" ? "" : (checkbox == 1 ? "checked" : "");
	
	$("#export-tb").append('<tr>\
								<td>\
									<div class="input-group">\
										<span class="input-group-addon">\
											<input onchange="masterchange();" type="checkbox" name="export-input-check[]" aria-label="..." '+ checkbox +'>\
										</span>\
										<input onchange="masterchange();" type="text" class="form-control" aria-label="..." name="export-input-text[]" value="'+ (typeof ival !== 'undefined' ? ival : '') +'">\
									</div><!-- /input-group -->\
								</td>\
								<td>\
									<textarea onchange="masterchange();" class="form-control" style="height:34px;" name="export-text[]">'+ (typeof itext !== 'undefined' ? itext : '') +'</textarea>\
								</td>\
								<td>\
									<img onclick="copyExport(this);" style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="copy.png"/>\
								</td>\
								<td><img onclick="destroyTR(this);" class="icons" src="trash.png"/></td> \
							</tr>');
	
}

function addFlag(checkbox, ival, itext){
	checkbox = typeof checkbox == "undefined" ? "" : (checkbox == 1 ? "checked" : "");
	
	$("#flag-tb").append('<tr>\
								<td>\
									<div class="input-group">\
										<span class="input-group-addon">\
											<input onchange="masterchange();" type="checkbox" name="flag-input-check[]" aria-label="..." '+ checkbox +'>\
										</span>\
										<input onchange="masterchange();" type="text" class="form-control" aria-label="..." name="flag-input-text[]" value="'+ (typeof ival !== 'undefined' ? ival : '') +'">\
									</div><!-- /input-group -->\
								</td>\
								<td>\
									<textarea onchange="masterchange();" class="form-control" style="height:34px;" name="flag-text[]">'+ (typeof itext !== 'undefined' ? itext : '') +'</textarea>\
								</td>\
								<td>\
									<img onclick="copyFlag(this);" style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="copy.png"/>\
								</td>\
								<td><img onclick="destroyTR(this);" class="icons" src="trash.png"/></td>\
							</tr>');
	
}

function destroyTR(obj){
	parent = $($(obj).parent()).parent();
	parent.remove();
	masterchange();
}

function copyModule(obj){
	parent = $($(obj).parent()).parent();
	parent.after(parent.clone());
	masterchange();
}

function copyExport(obj){
	parent = $($(obj).parent()).parent();
	parent.after('<tr>\
					<td>\
						<div class="input-group">\
							<span class="input-group-addon">\
								<input onchange="masterchange();" \
									type="checkbox" \
									aria-label="..." '+((parent.find("input[type=checkbox]").is(":checked")) ? "checked" : "")+' \
									name="export-input-check[]">\
							</span>\
							<input onchange="masterchange();" type="text" class="form-control" aria-label="..." \
							name="export-input-text[]" value="'+parent.find("input[type=text]").val()+'">\
						</div><!-- /input-group -->\
					</td>\
					<td>\
						<textarea onchange="masterchange();" name="export-text[]" class="form-control" style="height:34px;">'+parent.find("textarea").val()+'</textarea>\
					</td>\
					<td>\
						<img onclick="copyModule(this);" \
							style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="copy.png"/>\
					</td>\
					<td><img onclick="destroyTR(this);" class="icons" src="trash.png"/></td>\
				</tr>');
	masterchange();
}

function copyFlag(obj){
	parent = $($(obj).parent()).parent();
	parent.after('<tr>\
					<td>\
						<div class="input-group">\
							<span class="input-group-addon">\
							<input onchange="masterchange();" type="checkbox" aria-label="..." '+((parent.find("input[type=checkbox]").is(":checked")) ? "checked" : "")+' \
								name="flag-input-check[]">\
						</span>\
						<input onchange="masterchange();" type="text" class="form-control" name="flag-input-text[]" \
							aria-label="..." value="'+parent.find("input[type=text]").val()+'">\
						</div><!-- /input-group -->\
					</td>\
					<td>\
						<textarea onchange="masterchange();" name="flag-text[]" class="form-control" style="height:34px;">'+parent.find("textarea").val()+'</textarea>\
					</td>\
					<td>\
						<img onclick="copyModule(this);" style="cursor:pointer;width:23px;height:23px;vertical-align:bottom;" src="copy.png"/>\
					</td>\
					<td><img onclick="destroyTR(this);" class="icons" src="trash.png"/></td>\
				</tr>');
	masterchange();
}

function masterchange(choose){
	if ($("input[name=name]").val() != ""){
		$("#module-tb").find("input[type=checkbox]").each(function (index){
			//$(this).hide();
			$(this).attr("name", "module-input-check"+index);
		});
		$("#export-tb").find("input[type=checkbox]").each(function (index){
			//$(this).hide();
			$(this).attr("name", "export-input-check"+index);
		});
		$("#flag-tb").find("input[type=checkbox]").each(function (index){
			//$(this).hide();
			$(this).attr("name", "flag-input-check"+index);
		});
		url = "lol.php";
		if (typeof choose != 'undefined') {
			var name = prompt("Config name: ", $("input[name=name]").val());
			if (name == "") return false;
            if (name == "null") return false;
            if (name === null) return false;;
            //alert("Name : >" + name + "<");
			url="lol.php?choose=1&newname="+name;
		}
		$.ajax({
			type: 'POST',
			url: url,
			data: $("form").serialize(),
			success: function (data){
					//$("#verbose").html(data);
					$("#result").val(data);
					if (typeof choose != 'undefined'){
						$("#lists").append("<li><a href=\"javascript:loadFile('"+name+"');\">"+name+"</a></li>");
						loadFile(name);
					}
			}
		});
	}
            
	$('textarea').textareaAutoSize();
}

function loadFile(file){
	$.ajax({
		type: 'GET',
		url: "grab.php",
		data: "file="+file,
		success: function (data){
				//$("#verbose").html(data);
				data = data.split("\n");
				$("tr").remove();
				$("input[name=name]").val(file);
				$("input[name=cmdline]").val(data[0]);
				//alert(data);
				for (i = 1; i < data.length; i++){
					temp = data[i];
					temp = temp.split("->");
					if (temp[0] == "m"){
						addModule(temp[1], temp[2]);
					}else if (temp[0] == "e"){
						addExport(temp[1], temp[2], temp[3]);
					}else if (temp[0] == "f"){
						addFlag(temp[1], temp[2], temp[3]);
					}
				}
				if ($("#module-tb").find("tr").size() == 0) addModule(1);
				if ($("#export-tb").find("tr").size() == 0) addExport(1);
				if ($("#flag-tb").find("tr").size() == 0) addFlag(1);
				$('textarea').textareaAutoSize();
				masterchange();
		}
	});
}
