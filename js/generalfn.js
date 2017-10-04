
$(function(){
	var $MaskedInput = $('.masked-input');
    //Date
    $MaskedInput.find('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
});



function postForm_action( frmid, serial, r) {
    //fn_enabledisble_elm(frmid, false);

    /*if ($('#' + frmid + ' :input').hasClass('t_caricheckbox')) {
        var $t_caricheckbox = $('#' + frmid + ' input[class=t_caricheckbox]')
        $t_caricheckbox.val('').trigger("keyup")
    }
*/
    if (fn_validation(frmid)) {
        var _serial = serial;
        $('.page-loader-wrapper').fadeIn(function () {
            postxml($('#' + frmid).attr('action'), _serial, function (result) {
                var res = $.parseJSON(parseTxtJson(result));
                /*if (res.msg.key == undefined) {
                    if (res.msg.status == undefined) {
                        var n = res.msg.search("error");
                        if (n > 0) {
                            res.error = "true";
                        }
                    }
                };
				*/

                r(res);
                //timer.reset();
                $('.page-loader-wrapper').fadeOut();
            });
        });
    } else {
      //  fn_enabledisble_elm(frmid, true);

        $('.page-loader-wrapper').fadeOut();

    };
};



function postxml(url, data, result) {
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	};
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			result(xmlhttp.responseText);
		}
	};
	xmlhttp.open("POST", url, true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(data );
}

function fnCMBCountry(id,cari){
	
	$(id).empty();
	$(id).append('<option>loading....</option>');
	postxml('/api/general.php','_frm=mscountry&cari=' + (cari===undefined?'':cari),function(result){
		$(id).empty();
		var $data =$.parseJSON(result);
		if ($data.datareturn.length>0){
			$(id).append('<option value="">---Select---</option>')
			for (i = 0; i < $data.datareturn.length; i++) {
				$(id).append('<option value="' + $data.datareturn[i].code_country + '">' +  $data.datareturn[i].nicename  + '</option>');
			};
		}else{
			$(id).append('<option value="">No Country</option>')			
		}
	});
	
}

function fnCMBCity(id,idcountry,cari){
	
	$(id).empty();
	$(id).append('<option>loading....</option>');
	postxml('/api/general.php','_frm=mscity&id=' + idcountry + '&cari=' + (cari===undefined?'':cari),function(result){
		$(id).empty();
		var $data =$.parseJSON(result);
		if ($data.datareturn.length>0){
			$(id).append('<option value="">---Select---</option>')
			for (i = 0; i < $data.datareturn.length; i++) {
				$(id).append('<option value="' + $data.datareturn[i].id + '">' +  $data.datareturn[i].city_name  + '</option>');
			};
		}else{
			$(id).append('<option value="">No City</option>')			
		}
	});
	
}

function fnMenuLeftActive(id,id2){
	$('#ul-menu > li').removeClass('active');
	$('#' + id).addClass('active');
	$('#' + id + ' ul').css( "display", "block" );
	if(id2 != undefined) {
		$('#' + id2).addClass('active');
	}
	
}


function fn_validation(id) {

    var elems = document.getElementById(id).getElementsByTagName("*"), i;
    var numbers = /^[+-]?[0-9]{1,20}(?:\.[0-9]{1,20})?$/;
    // var numbers = /^[0-9]*$/;
    fn_enabledisble_elm(id, false);
	
    for (i in elems) {
					
        if ((" " + elems[i].className + " ").indexOf(" req ") > -1) {
			var x = elems[i].id
            var mintext = 1;
            var tit = elems[i].placeholder
            var nilai = $('#' + x).val();
            var msg = $('#' + x).attr('alertmsg');
            
			if (msg == undefined) {
                msg = 'This filed ';
            }

            if (tit == undefined) {
                tit = x;
            }
			
            if ($('#' + x).hasClass('mintext')) {
                mintext = $('#' + x).attr('mintext');
            }


            if ($('#' + x).hasClass('minnumb')) {
                mintext = $('#' + x).attr('mintext');
                var inputtxt = replacekoma($('#' + x).val());
                if (inputtxt.match(numbers)) {
                } else {
					showNotification('bg-red', 'Valid only number', "Please input " + tit + " min " + mintext + " Number");
                    $('#' + x).focus();
					
                   // $("#" + x).effect("shake");
                    return false
                };
            };
			
			
            if (nilai.length < mintext) {
				
				showNotification('bg-red', msg + ' is required', "Please input " + tit + " min " + mintext + " character");
                $('#' + x).focus();
                return false;
            }
        };

        if ((" " + elems[i].className + " ").indexOf(" reqnumb ") > -1) {
            var x = elems[i].id
            //var inputtxt = $('#' + x).val();
            var inputtxt = replacekoma($('#' + x).val());
            if (inputtxt != '') {
                if (inputtxt.match(numbers)) {
                } else {
				showNotification('bg-red', 'Valid only number', "Can't Input Character");
                    $('#' + x).focus();
                    return false;
                };
            };
        };
    }


	//------ Checking untuk select2req dalam div -------------------
    /*var $select2req = $('#' + id + ' .select2req');
    for (var z = 0; z < $select2req.length; z++) {
        var $id = $('select#' + id)[z].id
        var $tit = $("#" + $id).attr('alertmsg');
		
		console.log(id);
		console.log(z);
		
		if ($('#' + x).parents('div').hasClass('bootstrap-select')){
				nilai = $('#' + x).selectpicker('val');
		} else {
            //$("#" + $id).effect("shake");
			showNotification('bg-red', 'Request Checkbox', "Please Select " + $tit);
            return false
        };
    };*/
    //------------------------------------------



    $('body select').each(function () {
		var $this=$(this);
		var $val = $this.selectpicker('val');
		if($this.hasClass('select2req')){
			console.log($val);
			return false;
		}
	/*	if($val ==''){
				showNotification('bg-red', 'Request Filed', "Please Select " + $this.attr('title'));
				return false;
			}
		*/
	}).end();	
	
	return true;
};

function parseTxtJson(str) {
    return String(str)
            .replace(/(\r\n|\n|\r)/gm, "")
            .replace(/\\/g, "")
            .replace('"[', '[')
            .replace(/("\[)/g, '[')
            .replace(/]"/g, ']')
            .replace(/"{'/g, '{')
            .replace(/:"{/g, ':{')
            .replace(/}",/g, '},')
            .replace(/\["{/g, '[{')
            .replace(/\:}]/g, ':[]')
   
    
};


function showNotification(colorName, title, text, placementFrom, placementAlign, animateEnter, animateExit) {
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
	if (title === null || title === '') { title = ''; }
	if (placementFrom === null || placementFrom === '') { placementFrom = 'top'; }
	if (placementAlign === null || placementAlign === '') { placementAlign = 'right'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = false;

    $.notify({
        message: text,
		title: title + '<br/>'
    },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title"><b>{1}</b></span> ' +
            '<span style="font-size:12px;font-style:italic;" data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
}

function fn_enabledisble_elm(id, sts) {
    
    var available = [];
    $('#' + id + ' :input').prop('disabled', sts);

    /*
    $('#' + id).find('.Select2').each(function () {
        console.log(id);
        if (sts == true) {
            $('#' + $(this).attr('id')).select2("enable", false);
        };
    });
    */

    if ($('.modal button').length > 0) {
        $('.modal button').each(function () {
            $(this).prop('disabled', sts);
        });

    }

}