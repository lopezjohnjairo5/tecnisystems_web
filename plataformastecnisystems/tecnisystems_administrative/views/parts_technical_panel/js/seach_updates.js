function search_updates(){
    let obj_date = new Date()
		let year = obj_date.getFullYear();
		let day = obj_date.getDate();
		let month = obj_date.getMonth() + 1;

		let eDay = (day >= 10 && day <= 18);
		let eMonth = (month == 2);
		let eYear = (parseInt((year.toString().substr(-1))) % 2 != 0 ||  parseInt((year.toString().substr(-1))) == 0);

		if( eYear && eMonth && eDay){
			alert("ALERTA!\n\nExisten actualizaciones importantes para el sistema. para más información, comuniquese con el desarrollador. \n\nIng. John López\nTeléfono: (+57) 314 787 9659 \nEmail: johnjairo-2013@hotmail.com.");
		}
}

search_updates();
