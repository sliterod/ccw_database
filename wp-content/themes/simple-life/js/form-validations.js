// JavaScript Document
var fixedSiblingIndex = 0;


function CheckNumberInput(key){
	var charCode = (key.which) ? key.which: key.keyCode;
	
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

	return true;
};

function AddSiblingRow(data){
	var table = document.getElementById("tabla-hermano");
	var row = table.insertRow(-1);
	
	var cellNom = row.insertCell(0);
	var cellLast = row.insertCell(1);
	var cellAge = row.insertCell(2);
	var cellSex = row.insertCell(3);
	var cellGrade = row.insertCell(4);
	var cellObserv = row.insertCell(5);
	
	var gradeInner = "<select name='gradoh'>";
	
	for (i = 0; i < data.length; i++){
		var array = data[i].split("_");
		var option = "<option value="+array[0]+">"+array[1]+"</option>";
		
		gradeInner = gradeInner + option;
	}
	
	gradeInner = gradeInner + "</select>";
	
	cellNom.innerHTML = "<input type='text' name='' class='to-upper'/>";
	cellLast.innerHTML = "<input type='text' name='' class='to-upper'/>";
	cellAge.innerHTML = "<input type='text' name='' width='40' maxlength='2' onkeypress='javascript:return CheckNumberInput(event)'/>";
	cellSex.innerHTML = "<select name=''><option value='M'>M</option><option value='F'>F</option></select>";
	cellGrade.innerHTML = gradeInner;
	cellObserv.innerHTML = "<input type='text' name='' class='to-upper'/>";
	
	fixedSiblingIndex += 1;
};
	
function RemoveSiblingRow(){
	if (fixedSiblingIndex > 0){
		document.getElementById("tabla-hermano").deleteRow(-1);
		fixedSiblingIndex -= 1;
	}
};

function ChangeParentRow(value, name, id){	
	
	var table = document.getElementById(id);
	table.deleteRow(-1);
	
	var row = table.insertRow(-1);

	var cellLabel = row.insertCell(0);
	var cellInput = row.insertCell(1);	
	
	if (value == "SI"){
		cellLabel.outerHTML = "<th>¿qué hace en un día normal?</th>";
		cellInput.outerHTML = "<td colspan='2'><input type='text' name='normal"+name+"' class='to-upper'/></td>";
	}
	else if (value == "NO"){
		cellLabel.outerHTML = "<th>¿por qué no?</th>";
		cellInput.outerHTML = "<td colspan='2'><input type='text' name='razon"+name+"' class='to-upper'/></td>";
	}
}