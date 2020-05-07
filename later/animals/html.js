window.onload = () => {

	console.log(data);
	console.log(data.animals);
	console.log(data.animals[4]);
	console.log(data.animals[4].titles_link);

	const animals = data.animals;


	animals.forEach(function(animalsItem){

		// create an div html element
		var animalsElement = document.createElement("div");
		animalsElement.className = "ani";

		// create an h1 element for the name
		var titleElement = document.createElement("p");
	  titleElement.className = "titles";
		titleElement.innerText = animalsItem.titles;

		// create an span element for the category
    //var categoryElement = document.createElement("span");
		//categoryElement.className = "category";
		//categoryElement.innerText = animalsItem.category;

		//var priceElement = document.createElement("span");
	//	priceElement.className = "price";
		//priceElement.innerText = animalsItem.priceEuro;

		//var photoElement = document.createElement("img");
	//	photoElement.src = "./images/" + animalsItem.photo;

		// adding the virtual elements to actual html page by appending them
		// to body element
		animalsElement.append(titleElement);
		//animalsElement.append(photoElement);
		//animalsElement.append(categoryElement);
		//animalsElement.append(priceElement);


		document.body.append(animalsElement);
	});

}
