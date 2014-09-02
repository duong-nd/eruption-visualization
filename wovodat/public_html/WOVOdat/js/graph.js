

function hGraph() {
	var h=this;
	var id;
	var data;

	//Constructor
	id=_id;
	data=_data;


	//Methods

	//Constructor
	h.init=function(_id,_data) {
		id=_id;
		data=_data;
	}

	//
	h.draw=function() {
		var div=$('<div></div>');
		div.id=id;


		
		
		return div;
	}
}