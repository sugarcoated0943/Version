/**var a = 1;
        localStorage.setItem('session', a);
    var mylocal = localStorage.getItem('session');
    if(mylocal == 1){
        $('#frmMe').hide();
    }
**/

function Hide(){
	$('#frmMe').hide();
	$('#name').hide();
	$('#file').hide();
	$('#uploadpart').hide();
}
function Change(){
	
	var temp = localStorage.getItem('session2');
	if(temp == 2){
		$('#frmMe').show();
	}
	//document.getElementById('lilogin').innerHTML = "<a href=''>Logout</a>";
   
}

function Session(){
    var b = 2;
    localStorage.setItem('session', b);
    var mylocal1 = localStorage.getItem('session');
    
    if(mylocal1 == 2){
        $('frmMe').show();
    }
}

function Logout(){
	if(confirm("Are you sure?") == true){
    location.href="index.html";
  }
}