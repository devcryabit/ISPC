var searchr_loading = function(){

var dlist = '<div class="SearchDropDwnTable" style="margin-top:5px;margin-left:35px;"><table border="0" class="navigateable" align="left" cellpadding="0" cellspacing="0" class="SearchDropdwntble"><tr class="bluerow"><td><img src="images/loading.gif"></td></tr></table></div>';
 document.getElementById('searchdropdown').style.display = "";
 document.getElementById('searchdropdown').innerHTML=dlist;

}

var refs;
var searchdropdiv = function(params){
var trcolor;
refs = params.refs;

if(refs.length==1)
{
    shortcut.add("Enter",function() {
	document.location.href = appbase+'patientcourse/patientcourse?id='+refs[0].id;
});
}
	if(refs.length<1)
	{
	 //alert('No Result Found');
	 $("#searchdropdown").css({'height':'50px'});
	 $('#searchdropdown').hide('slow');
	 var dlist ='<div style="margin-top:5px;margin-left:35px;"><table border="0" align="left" cellpadding="0" cellspacing="0" class="overviewdatatable"><tr><td colspan="2" class="BlueBox">'+translate('noresultfound')+'</td></tr></table>';
	}
	else
	{

$("#searchdropdown").css({'height':'300px'});
var dlist = '<div class="grid"><table border="0" align="left" cellpadding="0" cellspacing="0" class="overviewdatatable" width="100%">';
 dlist+='<thead><tr class="BlueBg" ><td class="first" width="233">'+translate('firstname')+'</td><td width="200">'+translate('lastname')+' </td><td>'+translate('dateofbirth')+'</td><td width="350">'+translate('recordingdate')+' </td></tr></thead><tbody>';

	}
	var currentstatus = '9999999';

	for(i=0;i<params.refs.length;i++)
	{
		if(params.refs[i].status != currentstatus){
			if(params.refs[i].status == '0'){
				dlist+= ' <tr><td colspan="4">';
				 dlist+= '<div class="searchledgend">';
				 dlist+= '<div class="activerow">aktive Patienten</div>';
				 dlist+= '</div></td></tr>';
			}else if(params.refs[i].status == '1'){
				dlist+= ' <tr><td colspan="4">';
				 dlist+= '<div class="searchledgend">';
				 dlist+= '<div class="dischrgedrow">Entlassene Patienten</div>';
				 dlist+= '</div></td></tr>';
			}else if(params.refs[i].status == '2'){
				dlist+= ' <tr><td colspan="4">';
				 dlist+= '<div class="searchledgend">';
				 dlist+= '<div class="standbyrow">Anfragen</div>';
				 dlist+= '</div></td></tr>';
			}else if(params.refs[i].status == '3'){
				dlist+= ' <tr><td colspan="4">';
				 dlist+= '<div class="searchledgend">';
				 dlist+= '<div class="standbyrow">Gelöschte Anfragen</div>';
				 dlist+= '</div></td></tr>';
			}

			currentstatus =params.refs[i].status;

		}
		dlist+='<tr class="row" onclick="selectPat(\''+params.refs[i].id+'\')">';
		dlist+='<td class="first" width="233">'+params.refs[i].first_name +'</td>';
		dlist+='<td width="200">'+params.refs[i].last_name +'</td>';
		dlist+='<td width="200">'+params.refs[i].birthd +'</td>';
		dlist+='<td width="350">'+params.refs[i].admission_date +'</td>';
		dlist+='</tr>';
	}

	 dlist+= '</tbody</table> </div>';
//	 dlist+= '<div class="searchledgend">';
//	 dlist+= '<div class="activerow"><span></span>aktive Patienten</div>';
//	 dlist+= '<div class="dischrgedrow"><span></span>Entlassene Patienten</div>';
//	 dlist+= '<div class="standbyrow"><span></span>Anfragen</div>';
//	 dlist+= '</div> ';

	 document.getElementById('searchdropdown').style.display = "";
	 document.getElementById('searchdropdown').innerHTML=dlist;
	// document.getElementById('msg').innerHTML = "If doctor is not found in
	// list. please add new doctor from here";

}

function selectPat(i)
{
	/*
	 * document.getElementById('patientsearch').value =refs[i].referred_name;
	 * document.getElementById('refdropdown').style.display = "none";
	 * document.getElementById('hidd_patientsearch').value =refs[i].id;
	 */
	document.location.href = appbase+'patientcourse/patientcourse?id='+i;
}

 var livedirectsearchkeup =   function( e,ele ){
		// alert($(ele).attr('id'));
		id = $(ele).attr('id');

		// id = id.substring(t.length);

		if( e.keyCode == 40 ) {

			if( $( '.focused' ).length < 1 ) {
				// alert($("#diagnodropdown"+id+'tr:first'));
				// $("#diagnodropdown"+id+' tr:first').removeClass('bluerow');

				$("#searchdropdown tbody tr:first").addClass('focused');
				// alert($("#diagnodropdown"+dv+'tr:first'));
				// alert('$("#diagnodropdown"+dv+'tr:first')');
				// $('.list_name p:first' ).addClass( 'highlight' );
			} else {
				if( $( '.focused' ).next().length < 1 ) {
					$( '.focused' ).removeClass( 'focused' );
					$("#searchdropdown tr:first").addClass('focused');
				} else {
					var itsNext = $( '.focused' ).removeClass( 'focused' ).next().addClass( 'focused' );
					if( itsNext.is( ':hidden' ) ) {
						$( this ).trigger( { type : 'keyup', keyCode : 40 });
					} else {
						$( '.focused' )[0].scrollIntoView();
					}
				}
			}
			return;
		}
		if( e.keyCode == 38 ) {
			if( $( '.focused' ).length < 1 ) {
				$("#searchdropdown tr:last").addClass('focused');
			} else {
				if( $( '.focused' ).prev().length < 1 ) {
					$( '.focused' ).removeClass( 'focused' );
					$("#searchdropdown tr:last").addClass('focused');
				} else {
					var itsPrev = $( '.focused' ).removeClass( 'focused' ).prev().addClass( 'focused' );
					if( itsPrev.is( ':hidden' ) ) {
						$( this ).trigger( { type : 'keyup', keyCode : 38 });
					} else {
						$( '.focused' )[0].scrollIntoView();
					}
				}
			}
			return;
		}
		if( e.keyCode == 13 ) {
			$( '.focused' ).trigger( 'click' );
			return;
		}
		/*
		 * if( $.trim( this.value ) == '' ) { $( '.list_name' ).hide(); return; }
		 */

		newsearch($(ele).val());

	}

