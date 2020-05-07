window.onload = () => {

	console.log(data);
	console.log(data.works);
	console.log(picsdata);
	console.log(picsdata.photos);


	const works = data.works;

  works.forEach(function(worksItem){


   // create an iframe linkElement

   var frame = document.createElement("iframe");
       frame.className = "video_frames"
       frame.src = worksItem.v_src;


		// create an div html element
		var worksElement = document.createElement("div");
		    worksElement.className = "video_works";

        var linkElement = document.createElement("p");
    				linkElement.className = "video_titiles";
    				linkElement.innerText = worksItem.v_titles;



             var descriptionElement = document.createElement("p");
                descriptionElement.className = "video_descriptions";
                descriptionElement.innerText = worksItem.v_description;

    worksElement.append(frame);


		worksElement.append(linkElement);

    //worksElement.append(photoElement);

    worksElement.append(descriptionElement);




		document.body.append(worksElement);
	});


const photos = picsdata.photos

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









	photosElement.append(photoElement);


	photosElement.append(tElement);
	photosElement.append(desElement);




	document.body.append(photosElement);
});

}
