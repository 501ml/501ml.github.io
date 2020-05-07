window.onload = () => {

	console.log(picsdata);
	console.log(picsdata.photos);

	const photos = picsdata.photos;


	photos.forEach(function(photosItem){


   // create an iframe linkElement




		// create an div html element
		var photosElement = document.createElement("div");
		    photosElement.className = "pic_photos";

        var photoElement = document.createElement("img");
    	      photoElement.src = "i/" + photosItem.p_images;

		var tElement = document.createElement("p");
				tElement.className = "pic_titles";
				tElement.innerText = photosItem.p_titles;

        var desElement = document.createElement("p");
    				desElement.className = "pic_descriptions";
    				desElement.innerText = photosItem.p_descriptions;

		// create an p element for the name
		//var titleElement = document.createElement("p");
	      //titleElement.className = "titles";
		    //titleElement.innerText = photosItem.titles;




    //var photoElement = document.createElement("img");
	      //photoElement.src = "i/" + photosItem.image;







		photosElement.append(linkElement);

    photosElement.append(photoElement);

	  photosElement.append(tElement);

    photosElement.append(desElement);




		document.body.append(photosElement);
	});

}
