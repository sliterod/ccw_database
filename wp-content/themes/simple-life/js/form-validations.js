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
	
	/*var gradeInner = "<select name='gradoh"+fixedSiblingIndex+"'>";
	
	for (i = 0; i < data.length; i++){
		var array = data[i].split("_");
		var option = "<option value="+array[0]+">"+array[1]+"</option>";
		
		gradeInner = gradeInner + option;
	}
	
	gradeInner = gradeInner + "</select>";*/
	
	cellNom.innerHTML = "<input type='text' name='nombreh"+fixedSiblingIndex+"' class='to-upper'/>";
	cellLast.innerHTML = "<input type='text' name='apellidoh"+fixedSiblingIndex+"' class='to-upper'/>";
	cellAge.innerHTML = "<input type='text' name='edadh"+fixedSiblingIndex+"' width='40' maxlength='2' onkeypress='javascript:return CheckNumberInput(event)'/>";
	cellSex.innerHTML = "<select name='sexoh"+fixedSiblingIndex+"'><option value='M'>M</option><option value='F'>F</option></select>";
	cellObserv.innerHTML = "<input type='text' name='observh"+fixedSiblingIndex+"' class='to-upper'/>";
	cellGrade.innerHTML = gradeInner;
	fixedSiblingIndex += 1;
};
	
function RemoveSiblingRow(){
	if (fixedSiblingIndex > 0){
		document.getElementById("tabla-hermano").deleteRow(-1);
		fixedSiblingIndex -= 1;
	}
};

function ChangeParentRow(value, name, id){	
	
	/*var table = document.getElementById(id);
	table.deleteRow(-1);
	
	var row = table.insertRow(-1);*/

	var row = GetTable(id);
	
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

function ChangeConvertionRow(radioButton){
	var row = GetTable(id);
	
	var cellLabel = row.insertCell(0);
	var cellInput = row.insertCell(1);	
	
	if (value == "year"){
		cellLabel.outerHTML = "<th width='25%'>año conversión</th>";
		cellInput.outerHTML = "<td><input type='date' name='conver'/></td>";
	}
	else if (value == "full"){
		cellLabel.outerHTML = "<th width='25%'>f. conversión</th>";
		cellInput.outerHTML = "<td><input type='text' name='conver' onkeypress='javascript:return CheckNumberInput(event)' maxlength='4'/></td>";
	}
}

function GetTable(id){
	var table = document.getElementById(id);
	table.deleteRow(-1);
	
	var row = table.insertRow(-1);
	
	return row;
}

function GetSiblingCount(){
	
	var count = document.getElementById("tabla-hermano").rows.length - 2;
	
	document.getElementById("count").value = count;
}

/*Start of validations*/
function dateValidation(){
	
}