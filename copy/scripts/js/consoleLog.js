$(window).load(function () {
	$("#addGuestButton").click(function ()
	{
		const ServerUrl = 'http://chipin.ai-info.ru/scripts/php/main.php';
		var sUsername = $("#addGuestUsername").val();
		var sAge = $("#addGuestAge").val();
		var sQuantity = $("#addGuestQuantity").val();
		var sSum = $("#addGuestTotal").val();
		if((sUsername =='null' || sUsername=='')||
		(sAge =='null'|| sAge =='') ||
		 (sQuantity =='null' || sQuantity =='') || 
		 (sSum =='null' || sSum ==''))
		{
			alert("Все поля должны быть заполнены!");
		    return false;
	    }
		
		
		
		// var arrNewUser = [sUsername, sAge, sQuantity, sSum];
		var sNewUserParams = 'addGuestUsername=' + sUsername + '&addGuestAge=' + sAge + '&addGuestQuantity=' + sQuantity + '&addGuestTotal=' + sSum;

		var xhr = new XMLHttpRequest();
		xhr.open(
		  'POST',
		  ServerUrl,
		  true
		)
		
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onreadystatechange = function ()
		{
		  if (xhr.status === 200 && xhr.readyState == 4)
		  {
			var users = JSON.parse(xhr.response);
			$('.persons-content').remove();
			for (var i = 0; i < users.length; i++)
			{
			$('#personsTable').append(
				'<tr class="persons-content">' +
					'<td class="persons-content-note">' + users[i].name + '</td>' +
					'<td class="persons-content-note">' + users[i].age + '</td>' + 
					'<td class="persons-content-note">' + users[i].quantity + '</td>' + 
					'<td class="persons-content-note">' + users[i].payment + '</td>' +
				'</tr>'
			);
			}
		  }
		  else if(xhr.status != 200)
		  {
			console.log('err', xhr.responseText);
		  }
		}
		xhr.send(sNewUserParams);
	});
});