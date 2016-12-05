// <script>
	// $(function(){
	  // $('input[type="checkbox"]').change(function(){
		// //var testVar = 1;
		// var id=$(this).attr('id');
		// var value=$(this).val();
		// if ($(this).prop('checked'))
		// {
			// //alert(testVar);
			// //alert('id:'+id+' value:'+value);
			// switch (id) 
			// {
				// case 'milk':
					// //alert("milk inside switch");
					// milkchoc = true;
					// break;
				// case 'white':
					// whitechoc = true;
					// break;
				// case 'dark':
					// darkchoc = true;
					// break;
				// case 'straw':
					// strawberrybase = true;
					// break;
				// case 'cherry':
					// cherrybase = true;
					// break;
				// case 'blueberry':
					// blueberrybase = true;				
			// } 
		// }
	  // });
	// });
	// </script>

	
	$(document).ready(function() {
    $("#generateChoc").submit(function(event) {
		event.preventDefault();
		//alert("hi");
		console.log( $( this ).serializeArray() );
		//pull from the values array the things, for each one if it's a choc add that to the choclist
		
		
		var bugs;
		bugs = false;
		var price;
		price = 0;
		var choclist;
		choclist = [];
		var baselist;
		baselist = [];
		var values = $(this).serializeArray();
		var numChecked = values.length;
		//alert("numchecked = " + numChecked);
		for(i = 3; i < numChecked; i++)
		{
			var itsthiskind = whatKindIsIt(values[i].value);
			//alert("the value is " + values[i].value + " the returned value is " + itsthiskind);
		}
		//console.log(choclist);
		//if (values[3].value == "milk") alert("its a real boy mom");  
		
		function whatKindIsIt(value) {
			switch (value) 
			{
				case 'milk':
					choclist.push("milk");
					return "milk";					
					break;
				case 'white':
					choclist.push("white");
					return "white";						
					break;
				case 'dark':
					choclist.push("dark");
					return "dark";					
					break;
				case 'strawberry':
					baselist.push("strawberry");
					return "strawberry";					
					break;
				case 'cherry':
					baselist.push("cherry");
					return "cherry";					
					break;
				case 'blueberry':
					baselist.push("blueberry");	
					return "blueberry";
									
			} 
		} 
		
	
		
		var eventName = values[0].value;
		//alert (eventName);
		if(values[1].value == "yes")
		{
			console.log("bugs = yes");
			bugs = true;
			baselist.push("bugs");
		}else
		{
			bugs = false;
		}
		
		//alert("bugs = " + bugs);
		var bagSize = values[2].value;
		alert("bagsize = " + bagSize);
		var numPeople = values[3].value;
		//var budget = values[3];
		var nameForCartInput = eventName + " bags";

		//divide the number of people attending by number of chocolates, 
		//so if 2 are chosen then we
		//then for each choclate 
		switch (choclist.length) 
			{
				case 1:
					alert("1 type of chocolate chosen and its " + choclist[0]);
					//here I would make a switch stamtent for baselist and 
					//that would let me do a kinda recursive thing to solve this
					console.log(baselist.length);
					switch (baselist.length) 
					{
						//base case 1
						case 1:
							alert("1 type of base chosen and its " + baselist[0]);
							//offer a recomendation of numPeople bags of size bagSize that has a base of  baselist[0] and  choclist[0] chocolate
							alert("Chocolate Covered Goodness would recomend for your event " + numPeople + " " + bagSize + " bags with a base filling of " + baselist[0] + " covered with " + choclist[0] + " chocolate!");
							
							if( confirm('Would you like us to add these to your cart?') ) 
							{	
								var priceTemp = calcPrice(baselist[i],bagSize);
								alert("priceTemp on line 166 = " + priceTemp);
								$.ajax(
								{
									type: "POST",
									url: 'http://studentprojects.sis.pitt.edu/fall2016/kgc7/addToCartFinal.php',   
									data: { "name": nameForCartInput, "base": baselist[0], "chocType": choclist[0], "sizeOfBag": bagSize, "price": priceTemp, "numOrder": numPeople },
									success: function (result) {
									alert("Added to cart!");
									sucessEventAddToCart();	 
								}
								});
								
							}
							break;
						//base case 2
						case 2:
							var numPeople2 = (numPeople / 2) ;
							console.log("numPeople2 = " + numPeople2);
							alert("2 types of base chosen and its " + baselist[0] + " and " + baselist[1] );
							
							alert("Chocolate Covered Goodness would recomend for your event " + numPeople2 + " " + bagSize + " bags with a base filling of " + baselist[0] + 							
							" covered with " + choclist[0] + " chocolate!"
							+ " || AND "
							+ numPeople2 + " " + bagSize + " bags with a base filling of " + baselist[1] + 							
							" covered with " + choclist[0] + " chocolate!");

							if( confirm('Would you like us to add these to your cart?') ) 
							{	
								for(i = 0; i < 2 ; i++)
								{
									console.log("i = " + i);
									var priceTemp = calcPrice(baselist[i],bagSize);
									priceTemp = priceTemp * numPeople;
									console.log("priceTemp =  " + priceTemp +" baselist[i] = " + baselist[i]);
									$.ajax(
									{
										type: "POST",
										url: 'http://studentprojects.sis.pitt.edu/fall2016/kgc7/addToCartFinal.php',   
										data: { "name": nameForCartInput, "base": baselist[i], "chocType": choclist[0], "sizeOfBag": bagSize, "price": priceTemp, "numOrder": numPeople2 },
										success: function (result) {
										console.log("Added to cart!");									
									}
									});
								}
								
							}
							break;	
						//base case 3
						case 3:
							var numPeople3 = numPeople/3;
							alert("3 types of base chosen and its " + baselist[0] + " and " + baselist[1] + " and " + baselist[2] );
							
							alert("Chocolate Covered Goodness would recomend for your event " + numPeople3 + " " + bagSize + " bags with a base filling of " + baselist[0] + 							
							" covered with " + choclist[0] + " chocolate!"
							
							+ " || AND "
							+ numPeople3 + " " + bagSize + " bags with a base filling of " + baselist[1] + 							
							" covered with " + choclist[0] + " chocolate!"
							
							+ " || AND "
							+ numPeople3 + " " + bagSize + " bags with a base filling of " + baselist[2] + 							
							" covered with " + choclist[0] + " chocolate!");

							if( confirm('Would you like us to add these to your cart?') ) 
							{	
								for(i = 0; i < 3 ; i++)
								{
									console.log("i = " + i);
									var priceTemp = calcPrice(baselist[i],bagSize);
									priceTemp = priceTemp * numPeople;
									console.log("priceTemp =  " + priceTemp +" baselist[i] = " + baselist[i]);
									$.ajax(
									{
										type: "POST",
										url: 'http://studentprojects.sis.pitt.edu/fall2016/kgc7/addToCartFinal.php',   
										data: { "name": nameForCartInput, "base": baselist[i], "chocType": choclist[0], "sizeOfBag": bagSize, "price": priceTemp, "numOrder": numPeople2 },
										success: function (result) {
										console.log("Added to cart!");
										sucessEventAddToCart();
									}
									});
								}
								event.preventDefault();
							}
							
					}
					
					break;
				//Chocolate case 2
				case 2:
					alert("2 type of chocolate chosen and its " + choclist[0] + " " + choclist[1]);
					console.log(baselist.length);
						switch (baselist.length) 
						{
							// choc case 2 base case 1
							case 1: 
								var numPeople2 = (numPeople / 2) ;
								console.log("numPeople2 = " + numPeople2);
								alert("1 types of base chosen and its " + baselist[0] );
								
								alert("Chocolate Covered Goodness would recomend for your event " + numPeople2 + " " + bagSize + " bags with a base filling of " + baselist[0] + 							
								" covered with " + choclist[0] + " chocolate!"
								+ " || AND "
								+ numPeople2 + " " + bagSize + " bags with a base filling of " + baselist[0] + 							
								" covered with " + choclist[1] + " chocolate!");

								if( confirm('Would you like us to add these to your cart?') ) 
								{	
									for(i = 0; i < 2 ; i++)
									{
										console.log("i = " + i);
										var priceTemp = calcPrice(baselist[i],bagSize);
										priceTemp = priceTemp * numPeople;
										console.log("priceTemp =  " + priceTemp +" baselist[i] = " + baselist[i]);
										$.ajax(
										{
											type: "POST",
											url: 'http://studentprojects.sis.pitt.edu/fall2016/kgc7/addToCartFinal.php',   
											data: { "name": nameForCartInput, "base": baselist[0], "chocType": choclist[I], "sizeOfBag": bagSize, "price": priceTemp, "numOrder": numPeople2 },
											success: function (result) {
											console.log("Added to cart!");									
										}
										});
									}
									
								}
								break;
							//choc case 2 base case 2
							case 2:
								var numPeople4 = (numPeople / 4) ;
								//console.log("numPeople2 = " + numPeople2);
								alert("2 types of base chosen and its " + baselist[0] +" "  + baselist[1]);
								
								valert("Chocolate Covered Goodness would recomend for your event " + numPeople4 + " " + bagSize + " bags with a base filling of " + baselist[0] + 							
									" covered with " + choclist[0] + " chocolate!"
									+ " || AND "
									+ numPeople2 + " " + bagSize + " bags with a base filling of " + baselist[0] + 							
									" covered with " + choclist[1] + " chocolate!");
								
								

								if( confirm('Would you like us to add these to your cart?') ) 
								{	
									for(i = 0; i < 2 ; i++)
									{
										console.log("i = " + i);
										var priceTemp = calcPrice(baselist[i],bagSize);
										priceTemp = priceTemp * numPeople;
										console.log("priceTemp =  " + priceTemp +" baselist[i] = " + baselist[i]);
										$.ajax(
										{
											type: "POST",
											url: 'http://studentprojects.sis.pitt.edu/fall2016/kgc7/addToCartFinal.php',   
											data: { "name": nameForCartInput, "base": baselist[0], "chocType": choclist[I], "sizeOfBag": bagSize, "price": priceTemp, "numOrder": numPeople2 },
											success: function (result) {
											console.log("Added to cart!");									
										}
										});
									}
									
								}
								break;
							// choc case 2 base case 3
							case 3:
								
						}		
				//choc case 2 break:		
				break;
				//Chocolate case 3		
				case 3:
					
									
			}
		// darkchoc = false;
		// whitechoc = false;
		// strawberrybase = false;
		// cherrybase = false;
		/// blueberrybase = false;
		
		//create random bag 
		//var randum = getRandomInt(1,6);
		//alert(randum);
		//loop through the num people 
		//while inside a for
		
		//for (i = 0; i < numPeople; i++) 
		
		
		
		//alert("The price for 1 of these custom chocolate bags will be = " + price);

    })
	});
	
	//quick function i'm using to get a random number
	//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
	function getRandomInt(min, max) {
	  min = Math.ceil(min);
	  max = Math.floor(max);
	  return Math.floor(Math.random() * (max - min)) + min;
	}
	function sucessEventAddToCart() 
	{
		    $(".ayyform").hide();
			$(".showComplete").append("We've added your cutom event bags to your cart, go check it out here:  ");
	}
	function calcPrice(base, bagSize) 
	{
		var price1 = 0;
		console.log("base line 211 = " + base);
		console.log("bagSize line 212 = " + bagSize);
		switch (base) {
			case ("cherry"):
				price1 = 3;
				break;
			case ("blueberry"):
				price1 = 2;
				break;
			case ("strawberry"):
				price1 = 4;
				break;
			case ("bugs"):
				price1 = 1;
		} 
		switch (bagSize) {
			case ("small"):				
				break;
			case ("medium"):
				price1 = price1 *2;
				break;
			case ("large"):
				price1 = price1*3;
		}
		
		return price1;
	}