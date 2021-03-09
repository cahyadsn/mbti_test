<?php 
/*
BISMILLAAHIRRAHMAANIRRAHIIM - In the Name of Allah, Most Gracious, Most Merciful
================================================================================
filename 	: index.php
purpose  	: main application page
create   	: 20210210
last edit	: 20210215
author   	: cahya dsn
demo site 	: https://psycho.cahyadsn.com/mbti_test
soure code 	: https://github.com/cahyadsn/mbti_test
================================================================================
This program is free software; you can redistribute it and/or modify it under the
terms of the MIT License.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

See the MIT License for more details

copyright (c) 2021 by cahya dsn; cahyadsn@gmail.com
================================================================================*/
header("Content-type: text/javascript");
include 'inc/config.php';
echo "var aset='"._ASSET."';";
?>
$('.w3-radio').on('click',function(){
	$(this).parent().prev().removeClass('incomplete');
	$(this).parent().parent().prev().children().removeClass('incomplete');
});
$('#btn_kembali').on('click',function(e){
	e.preventDefault();
	$('tbody[id^="p"]').hide();
	var h=$('input#page').val()*1-1;
	$('input#page').val(h);
	$('tbody[id="p'+h+'"]').show();
	if(h==0){
		$(this).addClass('w3-disabled').prop("disabled", true); 
	}
	if( h < 13 ){
		$('#btn_lanjut').removeClass('w3-disabled').prop("disabled", false); 
		$('#btn_kirim').addClass('w3-disabled').prop("disabled", true);
	}
});
$('#btn_lanjut').on('click',function(e){
	e.preventDefault();
	$('tbody[id^="p"]').hide();
	var p=$('input#page').val()*1+1;
	$('input#page').val(p);
	$('tbody[id="p'+p+'"]').show();
	if(p>=0){
		$('#btn_kembali').removeClass('w3-disabled').prop("disabled", false); 
	}
	if( p == 13 ){
		$(this).addClass('w3-disabled').prop("disabled", true);; 
		$('#btn_kirim').removeClass('w3-disabled').prop("disabled", false);
	}
});
$('a.color').click(function(){
  var color=$(this).attr('data-value');
  document.getElementById('mbti_css').href=aset+'/css/w3/w3-theme-'+color+'.css';
  $.post(aset+'/js/change.color.php',{'color':color});
});
// Questionnaire Validation
$('form[id="mbti"] input[type="submit"]').on('click',function(e){
		var answered = 0;
		// Remove incomplete class from all questions
		$('form[id="mbti"] td').removeClass('incomplete');
		// Check does we have 60 questions answered
		for ( i=1; i<61; i++ ) {
			// count answered questions
			if ( $('form[id="mbti"] input[type="radio"][name^="d['+i+']"]:checked').length == 1 ) {
				answered++;
			} else {
				$('form[id="mbti"] input[type="radio"][name^="d['+i+']"]').each(function(i){
					$(this).parent().prev().addClass('incomplete');
				});
			}
		}
		if ( answered != 60 ) {
			// Prevent form submission
			e.preventDefault();
			// Display message
			$('#msg').html('You have answered '+answered+' out of 60 questions.<br>\nPlease review questionnaire and answer marked questions.');
			$('#warning').show();
		}
});