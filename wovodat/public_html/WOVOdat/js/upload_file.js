// Check form on submit
function check_form() {
	attached_file=document.translate_file_form.upload_file_inputfile.value;
	if (attached_file="") {
		return false;
	}
	// Else
	return true;
}

// Prevents "ENTER" to submit form
function noenter() {
	return !(window.event && window.event.keyCode==13);
}

// When page is loaded
$(document).ready(function(){
	// Hide elements on load
	$("#add_pub").hide();
	
	// Render as buttons
	$("#save_pub").button();
	$("#cancel_pub").button();
});

// Add another publication
function add_another() {
	$("#select_file").hide();
	$("#add_pub").show();
}

// No more publication
function no_more() {
	$("#select_file").show();
	$("#add_pub").hide();
	// Reset #another_pub radio buttons
	$("#another_pub_yes").removeAttr("checked");
	$("#another_pub_no").attr("checked", "true");
}

// Search title
function search_title(title_value) {
	$.ajax({
		method: "get", 
		url: "/php/search_title.php", 
		data: 'title=' + urlencode(title_value),
		success: function(html){
			$("#title_suggest").html(html);
		}
	});
}

// Search author
function search_auth(auth_value) {
	$.ajax({
		method: "get", 
		url: "/php/search_auth.php", 
		data: 'auth=' + urlencode(auth_value),
		success: function(html){
			$("#auth_suggest").html(html);
		}
	});
}

// Search journal
function search_journ(journ_value) {
	$.ajax({
		method: "get", 
		url: "/php/search_journ.php", 
		data: 'journ=' + urlencode(journ_value),
		success: function(html){
			$("#journ_suggest").html(html);
		}
	});
}

// Search publisher
function search_pub(pub_value) {
	$.ajax({
		method: "get", 
		url: "/php/search_pub.php", 
		data: 'pub=' + urlencode(pub_value),
		success: function(html){
			$("#pub_suggest").html(html);
		}
	});
}

// Free search results
function free_search(id) {
	$("#"+id).html("");
}

// Load data from suggestion
function load_all(title, auth, year, journ, vol, pub, page, doi, isbn, url, labadr, keywords) {
	$("#title_input").val(title);
	$("#auth_input").val(auth);
	$("#year_input").val(year);
	$("#journ_input").val(journ);
	$("#vol_input").val(vol);
	$("#pub_input").val(pub);
	$("#page_input").val(page);
	$("#doi_input").val(doi);
	$("#isbn_input").val(isbn);
	$("#url_input").val(url);
	$("#labadr_input").val(labadr);
	$("#keywords_input").val(keywords);
}

// Load journal from suggestion
function load_journ(journ) {
	$("#journ_input").val(journ);
}

// Load publisher from suggestion
function load_pub(pub) {
	$("#pub_input").val(pub);
}

// Save publication
function select_pub() {
	// Get number of publications in list
	var n_list = $("#n_list").val();
	var list="";
	if (n_list!=0) {
		// Get list of cb_ids
		list=$("#cb_id_1").val();
		var i=2;
		for (i=2; i<=n_list; i++) {
			list+="-" + $("#cb_id_"+i).val();
		}
	}
	// Get values
	var title = urlencode($("#title_input").val());
	var auth = urlencode($("#auth_input").val());
	var year = urlencode($("#year_input").val());
	var journ = urlencode($("#journ_input").val());
	var vol = urlencode($("#vol_input").val());
	var pub = urlencode($("#pub_input").val());
	var page = urlencode($("#page_input").val());
	var doi = urlencode($("#doi_input").val());
	var isbn = urlencode($("#isbn_input").val());
	var url = urlencode($("#url_input").val());
	var labadr = urlencode($("#labadr_input").val());
	var keywords = urlencode($("#keywords_input").val());
	// Get cb_id or insert new record in cb and update list of selected publications
	$.ajax({
		method: "get", 
		url: "/php/select_pub.php", 
		data: 'title=' + title + '&auth=' + auth + '&year=' + year + '&journ=' + journ + '&vol=' + vol + '&pub=' + pub + '&page=' + page + '&doi=' + doi + '&isbn=' + isbn + '&url=' + url + '&labadr=' + labadr + '&keywords=' + keywords + '&n_list=' + n_list + '&list=' + list,
		success: function(html){
			// Update list of selected publications
			$("#list_of_pub").append(html);
			// Hide #add_pub
			$("#add_pub").hide();
			// Show #select_file
			$("#select_file").show();
			// Reset #add_pub fields
			$("#title_input").val("");
			$("#auth_input").val("");
			$("#year_input").val("");
			$("#journ_input").val("");
			$("#vol_input").val("");
			$("#pub_input").val("");
			$("#page_input").val("");
			$("#doi_input").val("");
			$("#isbn_input").val("");
			$("#url_input").val("");
			$("#labadr_input").val("");
			$("#keywords_input").val("");
			// Reset #another_pub radio buttons
			$("#another_pub_yes").removeAttr("checked");
			$("#another_pub_no").attr("checked", "true");
			if (html!="") {
				// Increment n_list;
				n_list++;
				$("#n_list").val(n_list);
				// Change #another_pub_p
				$("#another_pub_p").html("From another publication?");
			}
		}
	});
}

function urlencode (str) {
    // http://kevin.vanzonneveld.net
    // +   original by: Philip Peterson
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: AJ
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +      input by: travc
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Lars Fischer
    // +      input by: Ratheous
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Joris
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // %          note 1: This reflects PHP 5.3/6.0+ behavior
    // %        note 2: Please be aware that this function expects to encode into UTF-8 encoded strings, as found on
    // %        note 2: pages served as UTF-8
    // *     example 1: urlencode('Kevin van Zonneveld!');
    // *     returns 1: 'Kevin+van+Zonneveld%21'
    // *     example 2: urlencode('http://kevin.vanzonneveld.net/');
    // *     returns 2: 'http%3A%2F%2Fkevin.vanzonneveld.net%2F'
    // *     example 3: urlencode('http://www.google.nl/search?q=php.js&ie=utf-8&oe=utf-8&aq=t&rls=com.ubuntu:en-US:unofficial&client=firefox-a');
    // *     returns 3: 'http%3A%2F%2Fwww.google.nl%2Fsearch%3Fq%3Dphp.js%26ie%3Dutf-8%26oe%3Dutf-8%26aq%3Dt%26rls%3Dcom.ubuntu%3Aen-US%3Aunofficial%26client%3Dfirefox-a'
    str = (str + '').toString();

    // Tilde should be allowed unescaped in future versions of PHP (as reflected below), but if you want to reflect current
    // PHP behavior, you would need to add ".replace(/~/g, '%7E');" to the following.
    return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').
    replace(/\)/g, '%29').replace(/\*/g, '%2A').replace(/%20/g, '+').replace(/~/g, '%7E');
}