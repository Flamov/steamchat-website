

var tip_transition = false;
var tip_expanded = false;

function tip_toggle () {

	if (tip_transition == true) {}

	else if (tip_transition == false) {

		tip_transition = true;

		if (tip_expanded == false) {

			$("#tipus a").html("Close");

			$("html, body").animate({ scrollTop: 0 }, 350);

			$( "#tip" ).toggleClass("tip_expanded", 700, "easeOutBounce", function() {

				tip_expanded = true;
				tip_transition = false;

			});

		}

		else if (tip_expanded == true) {

			$("#tipus a").html("Tip Us!");

			$( "#tip" ).toggleClass("tip_expanded", 700, "easeOutQuart", function() {

				tip_expanded = false;
				tip_transition = false;

			});


		};


	};	
            

};







