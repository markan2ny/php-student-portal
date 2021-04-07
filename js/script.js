function get_faculty_sched(facultyid, appendTo){

	$.post('../ajax/get_faculty_sched.php', {facultyid:facultyid}, function(data, status){
		// console.log(data);
		appendTo.html('<option value="" selected="" disabled="">-- Select Subject --</option>');

		if (data != '') {
			appendTo.append(data);
		} else {
			alert("No data found!");
		}
	});
}