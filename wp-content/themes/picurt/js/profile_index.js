$(document).ready(function() {

    
    var readURLp = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#pimg').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $("#pinp").on('change', function(){
        readURLp(this);
    });
    
    $("#picn").on('click', function() {
       $("#pinp").click();
    });
	
	
	
    var readURLa = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#aimg').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $("#ainp").on('change', function(){
        readURLa(this);
    });
    
    $("#aicn").on('click', function() {
       $("#ainp").click();
    });
	
	
    var readURLb = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#bimg').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $("#binp").on('change', function(){
        readURLb(this);
    });
    
    $("#bicn").on('click', function() {
       $("#binp").click();
    });
	
	
	
    var readURLc = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $("#cinp").on('change', function(){
        readURLc(this);
    });
    
    $("#cicn").on('click', function() {
       $("#cinp").click();
    });
	
	
});