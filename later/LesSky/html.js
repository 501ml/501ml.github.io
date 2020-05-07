window.onload = () => {

	console.log(data);
	console.log(data.repeater);
	console.log(data.repeater[4]);
	console.log(data.repeater[4].titles_link);

	const repeater = data.repeater;


	repeater.forEach(function(repeaterItem){

		// create an div html element
		var repeaterElement = document.createElement("div");
		repeaterElement.className = "les";

		// create an h1 element for the name
		var titleElement = document.createElement("p");
	  titleElement.className = "titles";
		titleElement.innerText = repeaterItem.titles;

		// create an span element for the category
    //var categoryElement = document.createElement("span");
		//categoryElement.className = "category";
		//categoryElement.innerText = repeaterItem.category;

		//var priceElement = document.createElement("span");
	//	priceElement.className = "price";
		//priceElement.innerText = repeaterItem.priceEuro;

		//var photoElement = document.createElement("img");
	//	photoElement.src = "./images/" + repeaterItem.photo;

		// adding the virtual elements to actual html page by appending them
		// to body element
		repeaterElement.append(titleElement);
		//repeaterElement.append(photoElement);
		//repeaterElement.append(categoryElement);
		//repeaterElement.append(priceElement);


		document.body.append(repeaterElement);
	});

}
